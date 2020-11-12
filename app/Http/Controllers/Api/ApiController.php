<?php

namespace App\Http\Controllers\Api;


use App\Hall;
use App\Unit;
use App\Zone;
use App\Order;
use App\Vehicle;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function order(Request $request) {
        $order = Order::create([
            'type'          =>$request->type,
            'name'          =>$request->name, 
            'image'         =>$request->image, 
            'user_add_id'   =>$request->user_id,
        ]);
        return response()->json($order);
    }
}
