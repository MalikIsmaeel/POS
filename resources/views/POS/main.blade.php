@extends('layouts.master')
@section('css')
@endsection
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
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                   <div class="col-md-8">
							<div class="row row-sm">
										
										@foreach ($data['entity'] as $entity)
										<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
											<div class="card">
												<div class="card-body">
													<div class="pro-img-box">
														<div class="d-flex product-sale">
															<i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
														</div>
														<img class="w-100" src="{{URL::asset('assets/img/ecommerce/02.jpg')}}" alt="product-image" id="{{$entity->id}}">
														<!-- <a href="{{route('add_cart',$entity->id)}}" class="adtocart"> <i class="las la-shopping-cart "></i> -->
														</a>
														
													</div>
													<div class="text-center pt-3">
														<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase" style="width:fit-content !importatant">{{$entity->product_name}}</h3>
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
														<a href="{{route('add_cart',$entity->id)}}" class="adtocart"> <i class="las la-shopping-cart "></i>
														</a>
													</div>
													<div class="text-center pt-3">
														<h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Handbag</h3>
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
									
										<ul class="pagination product-pagination mr-auto float-left">
											<li class="page-item page-prev disabled">
												<a class="page-link" href="#" tabindex="-1">Prev</a>
											</li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#">4</a></li>
											<li class="page-item"><a class="page-link" href="#">5</a></li>
											<li class="page-item page-next">
												<a class="page-link" href="#">Next</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12 mb-3 mb-md-0">
						<div class="card">
						
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
																		<h6 class="mt-0 text-uppercase" style="width:50px"> {{$details['product_name']}}</h6>
																		<dl class="card-item-desc-1">
																		<dt>price: </dt>
																		<dd>{{$details['price']}}</dd>
																		</dl>
																		
																	</div>
																</div>
															</div>
														</td>
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
                       										 <button class="btn btn-danger btn-sm deleteRecord" id="{{$id}}"><i class="fa fa-trash"></i></button>
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
                                   <h3>Total</h3>
								</td>
								<td style="margin: right 15px;px">{{$total}}</td>
						  </tr>
						  <tr>
								<td>
                                   <h3 >VAT</h3>
								</td>
								<td style="margin-roght:15px">{{$vat}}</td>
						  </tr>
						  <tr>
								<td>
                                   <h3>Total with vat</h3>
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
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script>

$(document).ready(function(){
	
    $('img').click(function(){

         var id=$(this).attr('id');
         console.log(id)
        $.ajax({
            url: "cart/"+id,
            method: "GET",
            type:"JSON",
    //         // data:id,
        success:function(data){
			$("#tbody").html(data);
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
			$("#tbody").html(data);
        }
    });
   
});
});
</script>

@endsection