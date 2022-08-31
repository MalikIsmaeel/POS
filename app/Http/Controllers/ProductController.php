<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\catogery;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =product::paginate(10);
        // ->where('active','=',1);
        // dd($users);
        return view('user.showall',['products'=>$product]);
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
            'name'=>'required|unique:product',
            'meature'=>'required|number',
            'type'=>'number',
            'active'=>'required',
            
        ]);

        $products=product::create( [
            'name'=>$request->namr,
            'meature'=>$request->meature,
            'type'=>$request->type,
            'active'=>$request->active ?? 0,
            'photo'=>$request->photo ,
            'catogery'=>$request->catogery,
            'user_id'=>$request->user_id,

            
        ]);

            return redirect()->back()->with('success', 'User Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=product::findorfail($id);
        
            return view('profile',['product'=>$product]);
    
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::findorfail($id);
        if($product){
        $products=product::create( [
            'name'=>$request->namr,
            'meature'=>$request->meature,
            'type'=>$request->type,
            'active'=>$request->active,
            'photo'=>$request->photo 
        ]);
        }

            return redirect()->back()->with('success', 'User Added successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($is)
    {
        $product=product::findorfail($id);
        if($product){
        $products=product::update( [
        
            'active'=>$request->input('0'),
       
        ]);
        }

            return redirect()->back()->with('success', 'Product Deleted successfully.');
    }
}
