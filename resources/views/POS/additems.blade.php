@extends('layouts.master')
@section('css')
<!-- Internal Gallery css -->
<link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Gallery</span>
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
				<!-- Gallery -->
				<div class="demo-gallery">
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
	@endif
	<!-- 'invoice_number', -->
    <!-- 'invoice_date',
    'date_due',
    'total',
    'total_vat',
    'supplier_id',
    
    'user_id' -->
@endif
					<ul id="lightgallery" class="list-unstyled row row-sm pr-0">
					        
					<li class="col-sm-8 col-lg-4" data-sub-html="<h4>Gallery Image 1</h4>" >
							@foreach($data['entity'] as $entity)
						 <ul class="row">
						 <li class="col-sm-2" data-responsive="{{URL::asset('assets/img/photos/$entity->id.jpg')}}" data-src="{{URL::asset('assets/img/photos/$entity->id.jpg')}}" data-sub-html="<h4>Gallery Image 9</h4>" >
							<a href="">
								<img class="img-responsive" src="{{URL::asset('assets/img/photos/'.$entity->catogery_id.'/'.$entity->id.'.jpg')}}" alt="Thumb-1">
							</a>
						</li>
						<li class="col-sm-2">
							{{$entity->product_name}}
						</li>
						
						<li class="col-sm-2">
							{{$entity->price}}
						</li>
							
						 </ul>
							
						</li>
                 @endforeach
				 <li>
				 <a class="btn ripple btn-warning" data-target="#modaldemo6" data-toggle="modal" href="">View Demo</a>
					
				 </li>
					</ul>
					<!-- /Gallery -->

					<!-- Pagination -->
					<div class="row mb-5">
						<div class="col-md-6 mt-1 d-none d-md-block">1 - 10 of 234 photos</div>
						<div class="col-md-6">
							<div class="float-left">
								<ul class="pagination search">
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
						</div><!-- COL-END -->
					</div>
					<!-- Pagination -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
		<div class="modal" id="modaldemo6">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Grid Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>	
					</div>
					<div class="modal-body">
					<div class="row">
					<div class="col-lg-12 col-md-12">
					<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Select<span class="tx-sserif">2</span>
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
								
								<div class="card-body">
							
							<div>
                    
						<form action="{{route('POS.store')}}" method="post" id="form_insert" class="H-100" enctype="multipart/form-data">
						@csrf
		
							<div class="row">
			
                                <div class="col-md-4 mb-3">
									<p>Countery</p>
								<select class="form-control select2" name="store_id">
											<option label="store..">

											</option>
											@foreach ($data['stores'] as $store)
											<option value="{{$store->id}}">
												{{$store->storecode}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
                                <div class="col-md-4 mb-3">
									<p>City</p>
								<select class="form-control select2" name="catogery_id">
											<option label="catogery">
											</option>
											@foreach ($data['catogeries'] as $catogery)
											<option value="{{$catogery->id}}">
												{{$catogery->catogery_name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>  
								 <div class="col-md-4 mb-3">
									<p>Subcity</p>
								 <select class="form-control select2" name="product_name">
											<option label="products..">
											</option>
											@foreach ($data['entity'] as $entity)
											<option value="{{$entity->id}}">
												{{$entity->product_name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>  
								 <div class="col-md-4 mb-3">
									<p>Store Type</p>
								 <select class="form-control select2">
											<option label="products..">
											</option>
											@foreach ($data['types'] as $type)
											<option value="{{$type->id}}">
												{{$type->option_value}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
									 <div class="col-md-4 mb-3">
										 <p>Qty</p>
								 <input type="number" name="qty" id="">   
										           
									 </div>
									 <div class="col-md-4 mb-3">
										 <p>Qty</p>
								 <input type="number" name="price" id="">   
										           
									 </div>
									 <div class="col-md-4 mb-3">
									<p>uints</p>
								<select class="form-control select2" name="unit_id">
											<option label="city..">
											</option>
											@foreach ($data['units'] as $unit)
											<option value="{{$unit->id}}">
												{{$unit->unit_name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div> 
							         <div class="col-md-4 mb-3">
									<p>uints</p>
								
											<input type="file" name="photo" id="">
										           
									 </div> 
											 
							</div>
							
						</div>
						<!-- $table->string('photo')->nullable();
            $table->foreignId('catogery_id')->references('id')->on('catogeries')->onDelete('cascade');
            $table->float('price');
            $table->float('cost');
            $table->unsignedInteger('active');
            $table->foreignId('tax_id')
            ->references('id')->on('options')
            ->onDelete('cascade'); // type of tax is it 15% 5% 0% 
            $table->string('product_name');
            $table->foreignId('store_name')
            ->references('id')->on('store_mstrs')
            ->onDelete('cascade');
            $table->foreignId('unit_id')
            ->references('id')->on('units')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->timestamps(); -->

					</div>
				
					</div>
				</div>
			



					
					<div class="modal-footer">
				
                            
                            <input type="submit" value="save" class="btn btn-primary w-25" id="add_btn">
                      
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</form>
					</div>
				</div>
			</div>
		</div>

@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Gallery js -->

@endsection