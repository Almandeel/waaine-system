<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use App\Order;
use App\Driver;
use App\Market;
use App\Company;
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
        return view('dashboard.index');
    }
}
