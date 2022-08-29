<?php

namespace App\Http\Controllers;

use App\Models\catogery;
use Illuminate\Http\Request;

class CatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $catogery= catogery::where('active','=','1')->get();
     return view('catogery.index')->with('catogeries',$catogery);
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
        'catogery_name'=>'required|min:5|max:50',
        'description'=>'max:100',
        'active'=>'required|in:0,1',
        'user_id'=>'required|',
        

       ]);
       
        $catogery=catogery::create([
            'catogery_name'=>$request->catogery_name,
        'description'=>$request->description,
        'active'=>'required|in:0,1',
        'user_id'=>'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function show(catogery $catogery)
    {
    
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function edit(catogery $catogery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catogery $catogery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\catogery  $catogery
     * @return \Illuminate\Http\Response
     */
    public function destroy(catogery $catogery)
    {
        //
    }
}
