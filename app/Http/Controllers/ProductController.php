<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

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
            'name'=>'required',
            'meature'=>'required|number',
            'type'=>'number',
            'active'=>'required',
            
        ]);
        $products=product::create( [
            'name'=>$request->namr;
            'meature'=>$request->meature;
            'type'=>$request->type;
            'active'=>$request->input('active','1');
            'photo'=>$request->photo
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
        if($product){
            return view('profile',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $product=product::findorfail($id);
        if($product){
        $products=product::create( [
            'name'=>$request->namr;
            'meature'=>$request->meature;
            'type'=>$request->type;
            'active'=>$request->active;
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
    public function destroy(product $product)
    {
        //
    }
}
