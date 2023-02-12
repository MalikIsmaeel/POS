@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Forms</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Form-Advanced</span>
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

						<!-- 'invoice_number'=>$request->invoice_number, -->
			<!-- //     'invoice_date'=>$request->invoice_date,
			//     'date_due'=>$request->date_due,
			//     'total'=>$request->total,
			//     'total_vat'=>$request->total_vat,
			//     'supplier_id'=>$request->supplier_id, -->
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
						<form action="{{route('entity.store')}}" method="post" id="form_insert" class="H-100">
						@csrf
		
				
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
                            <div class="row">
			
                                <div class="col-md-4 mb-3">
									<p>Countery</p>
								<select class="form-control select2">
											<option label="products..">

											</option>
											@foreach ($data['counteries'] as $countery)
											<option value="{{$countery->id}}">
												{{$countery->countery_name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
                                <div class="col-md-4 mb-3">
									<p>City</p>
								<select class="form-control select2">
											<option label="city..">
											</option>
											@foreach ($data['citys'] as $city)
											<option value="{{$city->id}}">
												{{$city->city_name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>  
								 <div class="col-md-4 mb-3">
									<p>Subcity</p>
								 <select class="form-control select2">
											<option label="products..">
											</option>
											@foreach ($data['subcites'] as $subcity)
											<option value="{{$subcity->id}}">
												{{$subcity->sub_cities_name}}
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
										 <p>Store Name</p>
								 <select class="form-control select2">
											<option label="products..">
											</option>
											@foreach ($data['stores'] as $store)
											<option value="{{$store->id}}">
												{{$store->storecode}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
								 	 
							</div>
							
						</div>
						<div class=" mb-1 ">
                                            <button class="btn btn-success add_item_btn w-25">Add</button>
                                        </div>

					</div>
				
					</div>
				</div>
			
				<!-- /row -->
				
				<div class="row">
					<div class="col-lg-12 col-md-12">
					<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Select<span class="tx-sserif">2</span>
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
								<div class="card-body">
							
							<div id="show_item">
                            <div class="row">
							<div class="col-sm-2 mb-3">
								<select class="form-control select2">
											<option label="products..">
											</option>
											@foreach ($data['catogeries'] as $catogery)
											<option value="{{$catogery->id}}">
												{{$catogery->name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
							
                                <div class="col-md-2 mb-3">
									
								<select class="form-control select2" name="product_name[]">
											<option label="products..">
											</option>
											@foreach ($data['products'] as $product)
											<option value="{{$product->id}}">
												{{$product->name}}
											</option>
											@endforeach
											
										</select>
										  
							         	<select class="form-control select2" name="unit_id[]">
											<option label="products..">
											</option>
											@foreach ($data['units'] as $unit)
											<option value="{{$unit->id}}">
												{{$unit->name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
                                <div class="col-md-1 mb-3">
                                            <input type="text" name="price[]" id="price" class="form-control" placeholder="product price">
                                 </div>
								 <div class="col-md-1 mb-3">
                                            <input type="text" name="qty[]" id="qty" class="form-control" value='1' placeholder="product quntites">
                                 </div>
								 <div class="col-lg-2 mg-t-20 mg-lg-t-0">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													15%
												</div><!-- input-group-text -->
											</div><!-- input-group-prepend -->
											<input class="form-control" id="vat"  placeholder="" type="text" name="vat" readonly>
										</div>
									</div>
								 <div class="col-md-3 mb-3">
                                            <input type="text" name="subtotal[]" id="subtotal" value="0.00" class="form-control" placeholder="">
                                 </div>
								 <div class="col-md-1 mb-3">
                                            <button class="btn btn-danger remove_item_btn">1
										</button>
											
											
											</div>
									 </div>
									 
							</div>
							
						</div>
						<div class=" mb-1 ">
                                            <button class="btn btn-success add_item_btn w-25">Add</button>
                                        </div>

					</div>
				 <div class="row h-50">
					<div class="col-lg-12 col-md-12">
					<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Select<span class="tx-sserif">2</span>
								</div>
								<div class="row row-sm mg-b-20">
								<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Total</p><div class="form-group"> <!-- Date input -->
									    <div class="form-group"> 
										<div class="input-group mb-3">
										<input class="form-control" id="total" name="total" placeholder="0.00" value="0.00" type="text" readonly/><div class="input-group-append">
												
											</div>
										</div>
										<span></span>
										
									
     										 </div>
											  </div>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Total VAT</p><div class="form-group"> <!-- Date input -->
									    <div class="form-group"> 
										<div class="input-group mb-3">
										<input class="form-control" id="totalvat" name="total_vat" placeholder="0.00" value="0.00" type="text" readonly/><div class="input-group-append">
												
											</div>
										</div>
										<span></span>
										
									
     										 </div>
											  </div>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Total with VAT </p><div class="form-group"> <!-- Date input -->
									    <div class="form-group"> 
										<div class="input-group mb-3">
										<input class="form-control" id="date" name="totalvat" placeholder="0.00" value="0.00"  type="text" readonly/><div class="input-group-append">
												
											</div>
										</div>
										<span></span>
										
									
     										 </div>
											  </div>
											  <div class=" mb-1  d-grid">
                            
                            <input type="submit" value="save" class="btn btn-primary w-25" id="add_btn">
                        </div>
									</div><!-- col-4 -->
									
								
							</div>
						</div>
					</div>
				
				</div>
					</div>
				</div>
			
				<!-- row -->
				</form>
				<!-- row closed -->
		  </div>
			<!-- Container closed -->
		
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
<script>
	$(document).ready(function()
        {
			let vat2 = 0;
			let sumtotal=0;
            $(".add_item_btn").click(function(e){
            e.preventDefault();
            
            
            $("#show_item").prepend(`<div class="row">
			<div class="col-sm-2 mb-3">
								<select class="form-control select2">
											<option label="products..">
											</option>
											@foreach ($data['catogeries'] as $catogery)
											<option value="{{$catogery->id}}">
												{{$catogery->name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
							
                                <div class="col-md-2 mb-3">
								<select class="form-control select2" name="product_name[]">
											<option label="products..">
											</option>
											@foreach ($data['products'] as $product)
											<option value="{{$product->id}}">
												{{$product->name}}
											</option>
											@endforeach
											
										</select>   
										           
									 </div>
                            <div class="col-md-1 mb-3">
                                            <input type="text" name="price[]" id="price" class="form-control" placeholder="product price">
                                 </div>
								 <div class="col-md-1 mb-3">
                                            <input type="text" name="qty[]" id="qty" class="form-control" value='1' placeholder="product quntites">
                                 </div>
								 <div class="col-lg-2 mg-t-20 mg-lg-t-0">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="input-group-text">
													15%
												</div><!-- input-group-text -->
											</div><!-- input-group-prepend -->
											<input class="form-control" id="vat"  placeholder="" type="text" name="vat" readonly>
										</div>
									</div>
								 <div class="col-md-3 mb-3">
                                            <input type="text" name="subtotal[]" id="subtotal" value="0.00" class="form-control" placeholder="">
                                 </div>
                                        <div class="col-md-1 mb-3">
                                            <button class="btn btn-danger remove_item_btn">1</button>
											
											
											</div>
									 </div>`);
            
        
        $(document).on('click','.remove_item_btn',function(e){
            e.preventDefault();
            let row_counter=$(this).parent().parent();
            $(row_counter).remove();
        });
		
  
    
});
$(document).on("change", "#price, #qty", function(e) {
	e.preventDefault();
	
var subtotal=0;
// alert("Malik");

var vat =0;
let price=$("#price").val();

vat =  ($("#price").val()*$("#qty").val()*0.15).toFixed(2);
subtotal+=+( $("#price").val()*$("#qty").val())+ ($("#price").val()*$("#qty").val()*0.15);
$("#vat").val(vat);
$("#subtotal").val(subtotal);
sumvat();
 total();
 
// totalvat();
})
function total()
{
	
	
	   $("#subtotal").each(function(){
			
	       sumtotal +=+$("#subtotal").val();
		   $("#total").val(sumtotal);
	  });
	//     
}

function sumvat()
{
	
	 
	   $("#vat").each(function(){
		
	       vat2 +=+$("#vat").val();
		   
	   $("#totalvat").val(vat2);
	  });
	//     
}
});         
</script>
@endsection