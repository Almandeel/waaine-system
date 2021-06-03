<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $halls = Hall::where('type', $request->type)->get();
        return view('dashboard.halls.index', compact('halls'));
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
            'image' => 'required'
        ]);
        
        $request_data = $request->except('image');

        if($request->image) {
            $name_image_rand = rand(0 , 100000);
            $fileupload = $request->image;
            $extention  = $fileupload->getClientOriginalExtension();
            $path       = $fileupload->move(public_path('images/halls'), 'image_' . time() . $name_image_rand .'.' . $extention);
            $nameimage = 'image_' . time() . $name_image_rand .  '.' . $extention;
        }
        $request_data['image'] = $nameimage;

        $hall = Hall::create($request_data);
        
        session()->flash('success', 'تمت العملية بنجاح');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        return view('dashboard.halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hall $hall)
    {
        $request_data = $request->except('image');

        if($request->image) {
            if(file_exists(public_path('images/halls/' . $hall->image))) {
                unlink(public_path('images/halls/' . $hall->image));
            }
            $name_image_rand = rand(0 , 100000);
            $fileupload = $request->image;
            $extention  = $fileupload->getClientOriginalExtension();
            $path       = $fileupload->move(public_path('images/halls'), 'image_' . time() . $name_image_rand .'.' . $extention);
            $nameimage = 'image_' . time() . $name_image_rand .  '.' . $extention;
            $request_data['image'] = $nameimage;
        }

        $hall->update($request_data);
        
        session()->flash('success', 'تمت العملية بنجاح');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
        //
    }
}
