<?
namespace App\Classes;
class Ajax
{
public function getcity($countery){


    $city['data'] = city::orderby("name","asc")
    ->get()->where('countery_id',$countery)
       ;

    return response()->json($empData);


}
public function addTocart(array $data){

    $product = store_dtl::findOrFail($id);
          
    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        $cart[$id]['qty']+=$product->qty;
    } else {
        $cart[$id] = [
            "product_name" => $product->product_name,
            "qty" => $product->qty,
            "price" => $product->price,
            "image" => $product->qty
        ];
    }
      
    session()->put('cart', $cart);
    return redirect()->back()->with('success','Product'.$product->product_name.' Added successfully.');
   
  

}
}

?>