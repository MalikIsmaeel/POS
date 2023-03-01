@extends('layouts.master')
@section('css')
@endsection
@section('content')
				<!-- row -->
				<div class="row mt-3 bg-grey">
                   <div class="col-md-8">
				   <div class="card">
							<div class="card-body p-2">
								<div class="input-group">
								<select class="form-control select2" id="stores">
											<option label="Store" value="0">
											</option>
											@foreach ($data['stores'] as $store)
											<option value="{{$store->id}}">
												{{$store->storecode}}
											</option>
											@endforeach
											
										</select>   
									
								<select class="form-control select2 col-6 mr-3 ml-3" id="category">
											<option label="catogery" value="0">
											</option>
											@foreach ($data['catogeries'] as $catogery)
											<option value="{{$catogery->id}}">
												{{$catogery->catogery_name}}
											</option>
											@endforeach
											
										</select>   
										           
								</div>
							</div>
						</div>
						
				   <div class="row row-sm" id="products">
										
										@foreach ($data['entity'] as $entity)
										<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
											<div class="card">
												<div class="card-body">
													<div class="pro-img-box">
														<div class="d-flex product-sale">
															<i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
														</div>
														<img class="w-100" src="{{URL::asset('assets/img/ecommerce/02.jpg')}}" alt="product-image" id="{{$entity->id}}" onclick="add_to_cart({{$entity->id}})">
	<!-- <a href="{{route('add_cart',$entity->id)}}" class="adtocart"> <i class="las la-shopping-cart "></i> -->
														</a>
														
													</div>
													<div class="text-center pt-3">
														<h6 class="h6 mb-2 mt-4 font-weight-bold text-uppercase" style="width:fit-content !importatant">{{$entity->product_name}}</h6>
														<span class="tx-15 ml-auto">
															<i class="ion ion-md-star text-warning"></i>
															<i class="ion ion-md-star text-warning"></i>
															<i class="ion ion-md-star text-warning"></i>
															<i class="ion ion-md-star-half text-warning"></i>
															<i class="ion ion-md-star-outline text-warning"></i>
														</span>
														<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">{{$entity->price}} <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">$79</span></h4>
													</div>
												</div>
											</div>
										</div>
										@endforeach
										<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
											<div class="card">
												<div class="card-body">
													<div class="pro-img-box">
														<div class="d-flex product-sale">
															<i class="mdi mdi-heart-outline ml-auto wishlist"></i>
														</div>
														<img class="w-100" src="{{URL::asset('assets/img/ecommerce/11.jpg')}}" alt="product-image">
														<a href="" class="adtocart"> <i class="las la-shopping-cart "></i>
														</a>
														<button type="button" class="btn btn-success btn-sm" style="width: 100%;" data-toggle="modal" data-target="#modal1">modal1</button>

													</div>
													<div class="text-center pt-3">
														<h6 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Handbag</h6>
														<span class="tx-15 ml-auto">
															<i class="ion ion-md-star text-warning"></i>
															<i class="ion ion-md-star text-warning"></i>
															<i class="ion ion-md-star text-warning"></i>
															<i class="ion ion-md-star-half text-warning"></i>
															<i class="ion ion-md-star-outline text-warning"></i>
														</span>
														<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">$19 <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">$39</span></h4>
													</div>
												</div>
											</div>
										</div>
									
										
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12 mb-3 mb-md-0">
						<div class="card" id="cartcard">
						
							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Filter</div>
							<div class="card-body">
							<table class="table slide table-hover mb-0 table-borderless">
										<thead>
											
										</thead>
										<tbody id="tbody">
										@php $total = 0 @endphp
										@php $vat = 0 @endphp
										@php $total_with_vat = 0 @endphp
       									 @if(session('cart'))
        							    @foreach(session('cart') as $id => $details)
											@php $total += ($details['price'] * $details['qty']*0.15)+$details['price'] * $details['qty'] @endphp
											@php $vat += $details['price'] * $details['qty']*0.15 @endphp
											@php $total_with_vat += ($details['price'] * $details['qty']*0.15)+$details['price'] * $details['qty'] @endphp
												<tr>
												<tr data-id="{{ $id }}">
												<td>
													<div class="media">
														
																<div class="media-body">
																	<div class="card-item-desc mt-0">
																		<h6 class="mt-0 text-uppercase" style=""> {{$details['product_name']}}</h6>
																		
																		
																	</div>
																</div>
															</div>
														</td>
														<td>{{$details['price']}}</td>
														<td>
														<div class="form-group">
															<input type="number" class="" style="width: 30px" id="qty" value="{{$details['qty']}}">
																</div>
														</td>
														<td class="text-center text-lg text-medium">{{$details['qty']*$details['price']}}</td>
														<td class="text-center text-lg text-medium">{{$details['qty']*$details['price']*0.15}}</td>
														<td class="text-center text-lg text-medium">{{($details['qty']*$details['price']*0.15)+$details['qty']*$details['price']}}</td>
														<td class="text-center">
														
														 <td class="actions" data-th="">
														 <meta name="csrf-token" content="{{ csrf_token() }}">
                       										 <button class="btn btn-danger btn-sm deleteRecord" id="{{$id}}" onclick="delete_record ({{$id}})"><i class="fa fa-trash"></i></button>
                    </td>
														
														
														
													</tr>
            @endforeach
			<!-- end foreach -->
        @endif 
											<!-- end if  -->
										</tbody>
									</table>
							</div>
							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">TOTAL</div>
							



							<div class="py-2 px-3">
								</label>
						<table class="table table-borderless">
							<tr>
								<td>
                                   <h6>Total</h6>
								</td>
								<td style="margin: right 15px">{{$total}}</td>
						  </tr>
						  <tr>
								<td>
                                   <h6 >VAT</h6>
								</td>
								<td style="margin-roght:15px">{{$vat}}</td>
						  </tr>
						  <tr>
								<td>
                                   <h6>Total with vat</h6>
								</td>
								<td style="margin-right:10px">{{$total_with_vat}}</td>
						  </tr>
						</table>
								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
							</div>
						</div>
					</div>
							</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
			<div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
          </div>
        </div>
      </div>
    </div>
		</div>
		<!-- main-content closed -->
		
@endsection
@section('js')
<script>

$(document).ready(function(){
	
    
	$('#category').on('change',function(e)
 {
    console.log(e);
    var cat_id = e.target.value;

$.ajax({
   url: "g_catg/"+cat_id,
   method: "GET",
   type:"JSON",
//         // data:id,
success:function(data){
//    $("#cartcard").html(data);
$("#products").html(data);

},
error: function( req, status, err ) {
   console.log( 'something went wrong', status, err );
}

});	
});
$('#stores').on('change',function(e)
 {
    console.log(e);
    var str_id = e.target.value;

$.ajax({
   url: "g_store/"+str_id,
   method: "GET",
   type:"JSON",
//         // data:id,
success:function(data){
//    $("#cartcard").html(data);
$("#products").html(data);

},
error: function( req, status, err ) {
   console.log( 'something went wrong', status, err );
}

});	
});
$(".deleteRecord").click(function (){
    var id = $(this).attr('id');

	var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "cart/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
			$("#cartcard").html(data);
        }
    });
   
});
});

function delete_record (id){
    // var d = this.id;
// console.log(id);
	var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "cart/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
			$("#cartcard").html(data);
        }
    });
   

}
function add_to_cart(id){

         
        
        $.ajax({
            url: "cart/"+id,
            method: "GET",
            type:"JSON",
    //         // data:id,
        success:function(data){
			$("#cartcard").html(data);
			// console.log(data)
        },
        error: function( req, status, err ) {
            console.log( 'something went wrong', status, err );
        }
        
    });
};
</script>

@endsection