<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\store_dtl;
class CartController extends Controller
{
    public function show(){
        return dd(session('cart'));
    }
    public function addToCart($id)
    {
        
        $product = store_dtl::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "qty" => $product->qty,
                "price" => $product->price,
                "image" => $product->qty
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success','Product '.$product->product_name.' successfully.');
       
      
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->qty){
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
