<?php

namespace App\Http\Controllers\Api;

use App\Dealer;
use App\Order;
use App\OrderTender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\orderRecource;
use App\User;
use Illuminate\Support\Facades\Validator;

class DealerController extends Controller
{
    public function NewOrders(Request $request) {
        $orders = Order::where('type', auth('api')->user()->trade_type)->where('status', 0)->orderBy('created_at' , 'DESC')->get();
        return new orderRecource($orders);
        // return response()->json($orders);
    }

    public function GetOrder(Request $request) {
        $order = Order::where('id', $request->order_id)->first();
        return new orderRecource($order);
    }

    public function tender(Request $request) {

        $validator = Validator::make($request->all(), [
            'order_id'        => 'required',
            'dealer_id'       => 'required',
            'price'           => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        $user = User::find($request->dealer_id);

        $tender = OrderTender::create([
            'order_id'        => $request->order_id,
            'dealer_id'       => $request->dealer_id,
            'price'           => $request->price,
            'dealer_name'            => $user->dealer->name,
            'dealer_phone'           => $user->dealer->phone,
            'dealer_location'        => $user->dealer->address,
        ]);

        $order = Order::find($request->order_id);

        $recipients = $order->user->pluck('fcm_token')->toArray();

        fcm()
        ->to($recipients)
        ->priority('high')
        ->timeToLive(0)
        ->notification([
            'title' => 'تمت اضافة عرض جديد',
            'body' => 'تمت اضافة  عرض جديد في الطلب رقم ' . $order->id,
        ])
        ->send();

        return response()->json(['message' => 'تم اضافة العرض']);
    }

    public function GetAcceptOrders(Request $request) {
        $orders = Order::where('user_accepted_id', auth('api')->user()->id)->get();
        return response()->json($orders);
    }
}
