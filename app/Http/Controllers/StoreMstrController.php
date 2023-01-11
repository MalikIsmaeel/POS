<?php

namespace App\Http\Controllers;
use App\Models\sub_city;
use App\Models\store_mstr;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StoreMstrController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store=store_mstr::where('active','=','1')->paginate(10);
        return view('store_mstr.index')->with(['stores'=>$store]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     $sub_city=sub_city::get()->where('active','=','1');

     return view('store_mstr.insert',['sub_cities'=>$sub_city]);
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
            'storecode'=>'required|unique:store_mstrs|min:5',
            'description'=>'max:200',
            'type'=>'required',        
            'active'=>'required',
            'sub_city_id'=>'required'
        ]);

        $store=store_mstr::create([
            'storecode'=>$request->storecode,
            
            'active'=>$request->active ?? 0,
            // 'user_id'=>Auth::user()->id ?? 1,
            'user_id'=>$request->user_id,

        
            'active'=>$request->active ?? 0,
            'user_id'=>$request->user_id,

            'sub_city_id'=>$request->sub_city_id
        ]);
        return redirect()->back()->with('success', $request->storecode.' Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store_mstr  $store_mstr
     * @return \Illuminate\Http\Response
     */
    public function show(store_mstr $store_mstr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store_mstr  $store_mstr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_city=sub_city::get()->where('active','=','1');
        $store=store_mstr::findOrfail($id);
        return view('store_mstr.edit',['sub_cities'=>$sub_city],['store'=>$store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\store_mstr  $store_mstr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $store=store_mstr::findOrfail($id);
        
        $store->update([
            'storecode'=>$request->storecode,
            'sub_cities'=>$request->sub_cities,
            'active'=>$request->active ?? 0,
            'user_id'=>Auth::user()->id ?? 1,
            
        ]);
        return redirect()->back()->with('success', $request->storecode.' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store_mstr  $store_mstr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,request $request)
    {
        $store= store_mstr::findorfail($id);
        $store->update([
            'active'=>$request->input('active','0')
        ]);

        return redirect()->back()->with('success', 'store deleted successfully.');
    }
}
