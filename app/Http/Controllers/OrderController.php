<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->type == "deactive") {
            $orders = Order::where('status', 0)->paginate();
        }

        if($request->type == "done") {
            $orders = Order::where('status', 1)->paginate();
        }

        else {
            $orders = Order::where('status', 0)->paginate();
        }

        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              => 'string | max:100',
            'type'              => 'required',
        ]);


        $order = Order::create([
            'type'          =>$request->type,
            'name'          =>$request->name, 
            'user_add_id'   => auth()->user()->id,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
