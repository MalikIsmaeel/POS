<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('layouts.head')
	</head>

	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
				
		<!-- main-content -->
		<div class="">
			@include('layouts.main-header')			
			<!-- container -->
			<div class="">
				@yield('page-header')
				@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
						<a href="{{ url('/') }}" class="btn btn-primary">EXIT</a>
									</div>
						<div class="mb-3 mb-xl-0">
							
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
<section>
@if ($errors->any())
		@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-times"></i>
						</button>
						<strong>danger !</strong> {{$error}}
					</div>
</br>
					@endforeach
				
				{{-- Message --}}
@else
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
			
        </button>
        <strong>Success !</strong> {{ session('success') }}
   </div>
   <iframe src="http://127.0.0.1:8000/invoice" style="display:none"></iframe>
	@endif
@endif
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
									
								<select class="form-control select2 col-3 mr-3 ml-3" id="category">
											<option label="catogery" value="0">
											</option>
											@foreach ($data['catogeries'] as $catogery)
											<option value="{{$catogery->id}}">
												{{$catogery->catogery_name}}
											</option>
											@endforeach
											
										</select>   
										
										<form  method="POST">
										
										<input type="text" name="key" id="product_sreach" class="form-control col-4 mr-3 ml-3">
											</form>    
								</div>
								
							</div>
						</div>
						
				   <div class="row row-sm " id="products" style="overflow: scroll!important;">
										
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
														<!-- </a> -->
														
													</div>
													<div class="text-center pt-3">
														<h6 class="h6 mb-2 mt-4 font-weight-bold text-uppercase" style="width:fit-content !importatant">{{$entity->product_name}}</h6>
														
														<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">{{$entity->cost}} 
													</div>
												</div>
											</div>
										</div>
										@endforeach
										<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
											<div class="card">
												<div class="card-body">
												<button type="button" class="btn btn-success btn-sm" style="width: 100%;" data-toggle="modal" data-target="#modal1">+</button>

													
												</div>
											</div>
										</div>
									
										
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12 mb-3 mb-md-0">
						<div class="card" id="cartcard" style="">
						
							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Filter</div>
							<div class="card-body">
							<table class="table slide table-hover mb-0 table-borderless">
										<thead>
										<tr><td>product</td><td>price</td><td>qty</td><td>vat</td><td>subtotal</td></tr>	
										</thead>
										<tbody id="tbody"style="overflow: scroll;">
										@php $total = 0 @endphp
										@php $vat = 0 @endphp
										@php $total_with_vat = 0 @endphp
       									 @if(session('cart'))
        							    @foreach(session('cart') as $id => $details)
											@php $total +=$details['cost'] * $details['qty'] @endphp
											@php $vat += $details['cost'] * $details['qty']* 0.15 @endphp
											@php $total_with_vat = $total+$vat @endphp
												<tr>
												<tr data-id="{{ $id }}">
												<td style="padding:0px !important">
													 {{$details['product_name']}}
														</td>
														<td style="padding:0px !important">{{$details['cost']}}</td>
														<td style="padding:0px !important">
														<div class="form-group d-flex">
														<button class="btn  btn-sm deleteRecord" id="{{$id}}" onclick="update_record ({{$id}},'+')"><i class="far fa-arrow-alt-circle-right"></i></button>
														{{$details['qty']}}		
														<button class="btn  btn-sm deleteRecord" id="{{$id}}" onclick="update_record ({{$id}},'-')"><i class="far fa-arrow-alt-circle-left"></i></button>
        
															
																</div>
														</td>
														<td class="text-center text-lg text-medium" style="padding:0px 0px !important">{{$details['qty']*$details['cost']}}</td>
														<td class="text-center text-lg text-medium" style="padding:0px 0px !important">{{$details['qty']*$details['cost']*0.15}}</td>
														<td class="text-center text-lg text-medium" style="padding:0px 0px !important">{{($details['qty']*$details['cost']*0.15)+$details['qty']*$details['cost']}}</td>
														<td class="text-center" style="padding:0px 0px !important">
														
														 
														 <meta name="csrf-token" content="{{ csrf_token() }}">
                       										 <button class="btn btn-danger btn-sm deleteRecord" id="{{$id}}" onclick="delete_record ({{$id}})"><i class="fa fa-trash"></i></button>
																   
														
														
														
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
								<form action="{{route('sales.store')}}" method="post">
									@csrf
						     <table class="table table-borderless">
							 <tr>
								<td>
                                   <h6>Total</h6>
								</td>
								<td style="margin: right 15px"><input type="text" name="total" id="" value="{{$total}}" readonly></td>
						      </tr>
						     <tr>
								<td>
                                   <h6 >VAT</h6>
								</td>
								<td style="margin-roght:15px"><input type="text" name="vat" id="" value="{{$vat}}" readonly></td>
						  </tr>
						  <tr>
								<td>
                                   <h6>Total with vat</h6>
								</td>
								<td style="margin-right:10px"><input type="text" name="total_with_vat" id="" value="{{$total_with_vat}}" readonly></td>
						  </tr>
						 </table>
								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit" onclick="window.print();">save</button>
							</div>
							</form>
						</div>
					</div>
							</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
			<!-- <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
		<iframe src="http://127.0.0.1:8000/invoice" style="overflow: scroll;"></iframe> -->

		<!-- main-content closed -->
</section>
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
$("#product_sreach").keyup(function (e){
	var id = e.target.value;
    // console.log(id)
	var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "product_search/"+id,
        type: 'GET',
        data: {
        //     "id": id,
            "_token": token,
        },
        success: function (data){
			$("#products").html(data);
			// console.log(data)
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

function update_record(id,ch){

         
        
$.ajax({
	url: "update-cart/"+id+'/'+ch,
	method: "patch",
	type:"JSON",
	data: {_token: '{{ csrf_token() }}'},
//         // data:id,
success:function(data){
	// $("#cartcard").html(data);
	$("#cartcard").html(data);
},
error: function( req, status, err ) {
	console.log( 'something went wrong', status, err );
}

});
};
</script>

				@include('layouts.sidebar')
				@include('layouts.models')
            	@include('layouts.footer')
				@include('layouts.footer-scripts')	
	</body>
</html>