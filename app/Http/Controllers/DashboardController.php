<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $order_new = Order::whereStatus(0)->count();
        $order_done = Order::whereStatus(1)->count();
        return view('dashboard.index', compact('order_done', 'order_new'));
    }
}
