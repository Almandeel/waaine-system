<?php

namespace App\Http\Controllers;

use App\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealers = Dealer::all();
        return view('dashboard.dealers.index', compact('dealers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required | string | max:45',
            'phone'             => 'required | string | max:255 | unique:users',
        ]);

        $request_data = $request->all();

        $dealer = Dealer::create($request_data);

        $dealer->user()->create([
            'name' =>   $dealer->name,
            'phone' =>  $dealer->phone,
            'address' =>$dealer->address,
            'password' => Hash::make(12345678),
            'status' => 1,
            'trade_type' =>$request->trade_type,
        ]);
        
        session()->flash('success', 'تمت العملية بنجاح');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function show(Dealer $dealer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function edit(Dealer $dealer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dealer $dealer)
    {
        $request->validate([
            'name'              => 'required | string | max:45',
            'phone'             => 'required | string | max:255 | unique:users,phone,' . $dealer->user->id,
        ]);

        $request_data = $request->all();

        $dealer->update($request_data);

        $dealer->user->update([
            'name' =>   $dealer->name,
            'phone' =>  $dealer->phone,
            'address' =>$dealer->address,
            'trade_type' =>$request->trade_type,
        ]);
        
        session()->flash('success', 'تمت العملية بنجاح');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dealer  $dealer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dealer $dealer)
    {
        //
    }
}
