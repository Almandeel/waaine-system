<?php

namespace App\Http\Controllers\Api;


use App\Hall;
use App\Unit;
use App\User;
use App\Zone;
use App\Order;
use App\Vehicle;
use App\OrderItem;
use App\OrderTender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        //, ['only' => ['orders']]
    }

    /**
     * $type == 1 halls 
     * $type == 2 hotel
     */

    
    public function halls(Request $request) {
        $halls = Hall::where('type', $request->type)->get();
        return response()->json($halls);
    }

    public function hall(Request $request) {
        $hall = Hall::find($request->id);
        return response()->json($hall);
    }

    public function StoreOrder(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'              => 'string | max:100',
            'user_add_id'       => 'required',
            'type'              => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        $order = Order::create([
            'type'          =>$request->type,
            'name'          =>$request->name, 
            'user_add_id'   =>$request->user_add_id,
        ]);

        if($request->image) {
            $name_image_rand = rand(0 , 100000);
            $fileupload = $request->image;
            $extention  = $fileupload->getClientOriginalExtension();
            $path       = $fileupload->move(public_path('images/orders'), 'image_' . time() . $name_image_rand .'.' . $extention);
            $nameimage = 'image_' . time() . $name_image_rand .  '.' . $extention;

            $order->update([
                'image' => $nameimage,
            ]);
        }

        $recipients = User::where('trade_type', $request->type)->get()->pluck('fcm_token')->toArray();

        fcm() 
        ->to($recipients)
        ->priority('high')
        ->timeToLive(0)
        ->notification([
            'title' => 'طلب جديد',
            'body' => 'تم اضافة طلب جديد',
        ])
        ->send();

        return response()->json($order);
    }

    public function GetOrders(Request $request) {
        $orders = Order::where('user_add_id', $request->user_id)->get();
        return response()->json($orders);
    }

    public function GetOrder(Request $request) {
        $order = Order::with('tendres')->where('id', $request->order_id)->first();
        return response()->json($order);
    }

    public function tender(Request $request) {
        $tender = OrderTender::find($request->tender_id);

        $tender->update([
            'status' => 1
        ]);

        $order = Order::where('id', $tender->order_id)->first();

        $order->update([
            'status' => 1
        ]);

        $recipients = $tender->dealer->user->pluck('fcm_token')->toArray();

        fcm() 
        ->to($recipients)
        ->priority('high')
        ->timeToLive(0)
        ->notification([
            'title' => 'تمت الموافقة على عرض',
            'body' => 'تمت الموافقة على عرض في الطلب رقم ' . $order->id,
        ])
        ->send();

        return response()->json(['message' => 'تم قبول العرض']);
    }
}
