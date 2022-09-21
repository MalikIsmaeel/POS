@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
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
@endif
					<div class="col-md-6 col-sm-6">
						<div class="card  box-shadow-0">
							<div class="card-header">
								
            
            
								<h4 class="card-title mb-1">Default Form</h4>
								<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
							</div>
							<form action="{{route('purchase.store')}}" method="POST">
										@csrf

										<div class="card shadow">
                <div class="card-header">
                    <h4>Add items</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post" id="add_form">
                        <div id="show_item">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                            <input type="text" name="product_name[]" class="form-control" id="product" placeholder="product name">
                                </div>
                                 <div class="col-md-3 mb-3">
                                            <input type="text" name="qty[]" id="qty" class="form-control" placeholder="product quntites">
                                 </div>
                                <div class="col-md-3 mb-3">
                                            <input type="text" name="price[]" id="price" class="form-control" placeholder="product price">
                                 </div>
                                        <div class="col-md-2 mb-3 d-grid">
                                            <button class="btn btn-success add_item_btn">Add More</button>
                                        </div>
                        </div>
                        </div>
                        <div>
                            <input type="submit" value="save" class="btn btn-primary w-25" id="add_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
				<!-- row -->

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		
		<!-- main-content closed -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
<script>
	$(document).ready(function()
        {
            $(".add_item_btn").click(function(e){
            e.preventDefault();
            
            
            $("#show_item").prepend(`<div class="row">
                                <div class="col-md-3 mb-3">
                                            <input type="text" name="product_name[]" class="form-control" id="product" placeholder="product name">
                                </div>
                                 <div class="col-md-3 mb-3">
                                            <input type="text" name="qty[]" id="qty" class="form-control" placeholder="product quntites">
                                 </div>
                                <div class="col-md-3 mb-3">
                                            <input type="text" name="price[]" id="price" class="form-control" placeholder="product price">
                                 </div>
                                        <div class="col-md-2 mb-3 d-grid">
                                            <button class="btn btn-danger remove_item_btn">remove</button>
                                        </div> </div>`);
            
        });
        $(document).on('click','.remove_item_btn',function(e){
            e.preventDefault();
            let row_counter=$(this).parent().parent();
            $(row_counter).remove();
        });
    });
</script>
@endsection