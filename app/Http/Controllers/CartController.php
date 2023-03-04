<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\store_dtl;
use App\Models\sales;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function show(){
        return dd(session('cart'));
    }
    public function addToCart($id)
    {
        
        $product = store_dtl::findOrFail($id);
          $qty=1;
          $cart = session()->get('cart', []);
          $ivoice=sales::get()->last()->id;
        if(isset($cart)){
            
            $ivoice++;
        }
        if(isset($cart[$id])) {
            $cart[$id]["qty"]++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "product_id"=>$id,
                "qty"=>$qty,
                "unit_id"=>$product->unit_id,
                "store_id"=>$product->store_name,
                "cost" => $product->price,
                "invoice_id"=>$ivoice,
                "sub_total"=>$qty * $product->price,
                "tax"=>$product->price * $product->price*0.15,
                "active"=>1,
                "user_id"=>Auth::user()->id
            ];
        }
          
        session()->put('cart', $cart);
        // return response()->json(array('cart'=> $cart), 200) ;
        return view('POS.cart');
       
      
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update($id,$op)
    {
        if($id && $op){
            $cart = session()->get('cart');
            if($op=='+'){
                $cart[$id]["qty"]++;
            }
            if($op=='-'){
                if($cart[$id]["qty"]==0){
                
                    unset($cart[$id]);
                    
                }
                else{
               --$cart[$id]["qty"];
                }
            }
            
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        return view('POS.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // session()->flash('success', 'Product removed successfully');
            return view('POS.cart');
        }
    }
    public function checkout()
    {
        // $table->string('invoice_number');
        //     $table->date('invoice_date');
        //     $table->date('date_due');
        //     $table->integer('total');
        //     $table->integer('total_vat');
        //     $table->integer('total_with_vat');
            
        
            $carts = session()->get('cart');
            $invoice=[];
            $invoice_id = "INV ".(sales::get()->last()?->id+1 ?? 1);
            $total=0;
            if(isset($carts)) {
                foreach ($carts as $id =>$product_cart){
                    $product = store_dtl::where('id',$id)->first();
            
                   $invoice['qty']= $product_cart['qty'];
                  
                    // $invoice['product_id']=$request->product_id;
            // //        $invoice['store_id']=$request->store_id;
                //    $invoice['active']=1;
            //        $invoice['unit_id']=$product->unit_id;
                   $invoice['price']=$product->price ?? 0;
                   $invoice['user_id']=Auth::user()->id;
                    $invoice['store_id']=$product->store_name;
                    $invoice['product_id']=$product->id;
                    $invoice['sub_total']=$product->price * $product_cart['qty'];
            //        $invoice['invoice_id']=$invoice_id ?? 1;
                   $invoice['tax']=$invoice['sub_total'] * 0.15;
            // //        
            $total+=$invoice['sub_total'];
            // //     invoice_parchase_entity::create($options_data);
        
            $invoice['total']=$total;
            echo var_dump($invoice);  
            }
            // session()->flash('success', 'Product removed successfully');
            $invoice['total']=0;
            
        }
        // return dd($carts);
    }

}
