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
				<form action="#" method="post" id="form_insert">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Single Select Style</h6>
									<p class="text-muted card-sub-title">First import a latest version of jquery in your page. Then the jquery.sumoselect.min.js and its css (sumoselect.css)</p>
								</div>
								<div class="mb-4">
									<p class="mg-b-10">Single Select</p>
									<select name="somename" class="form-control SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
										<!--placeholder-->
										<option title="Volvo is a car"  value="volvo">Volvo</option>
										<option value="saab">Saab</option>
										<option value="mercedes">Mercedes</option>
										<option value="audi">Audi</option>
									</select>
								</div>
								<div class="mb-4">
									<p class="mg-b-10">Disabled Select</p>
									<select class="SlectBox form-control" disabled>
										<option value="volvo">Volvo</option>
										<option selected value="saab">Saab</option>
										<option value="mercedes">Mercedes</option>
										<option value="audi">Audi</option>
										<option disabled value="opt1">option1</option>
										<option value="opt2">option2</option>
										<option value="opt3">option3</option>
									</select>
								</div>
								<div col-md-3 mb-3>
									<p class="mg-b-10">Inline Select</p>
									<select class="SlectBox form-control">
										<option>selected</option>
										<option>Volvo</option>
										<option>Saab</option>
										<option value="mercedes">Mercedes</option>
										<option value="audi">Audi</option>
										<option>Volvo</option>
										<option>Saab</option>
										<option value="mercedes">Mercedes</option>
										<option value="audi">Audi</option>
										<option>Volvo</option>
										<option>Saab</option>
										<option value="mercedes">Mercedes</option>
										<option value="audi">Audi</option>
										<option>Volvo</option>
										<option>Saab</option>
										<option value="mercedes">Mercedes</option>
										<option value="audi">Audi</option>
									</select>
								</div>
							</div>
							
						</div>
					</div>
				
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
						
                                <div class="">
									
								<div>
									<h6 class="card-title p-3">Single Select Style</h6>
									<div class=" mb-1 mr-4 d-grid">
                                            <button class="btn btn-success add_item_btn w-25">Add More</button>
                                        </div>   
                        
						
								</div>  
                        </div>
							<div class="card-body">
							<div id="show_item">
                            <div class="row">
							
							</div>
						</div>
						<div>
                            <input type="submit" value="save" class="btn btn-primary w-25" id="add_btn">
                        </div>

					</div>
					</div>
				</div>
			
				<!-- /row -->

			

				<!-- row -->
				</form>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
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
            $(".add_item_btn").click(function(e){
            e.preventDefault();
            
            
            $("#show_item").prepend(`<div class="row">
                                <div class="col-md-2 mb-3">
								
                                            <input type="text" name="product_name[]" class="form-control" id="product" placeholder="product name">
                                </div>
                                 <div class="col-md-2 mb-3">
                                            <input type="text" name="qty[]" id="qty" class="form-control" placeholder="product quntites">
                                 </div>
                                <div class="col-md-2 mb-3">
                                            <input type="text" name="price[]" id="price" class="form-control" placeholder="product price">
                                 </div>
								 <div class="col-md-2 mb-3">
                                            <input type="text" name="tax[]" id="tax" class="form-control" placeholder="product tax">
                                 </div>
								 <div class="col-md-2 mb-3">
                                            <input type="text" name="sub_total[]" id="tax" class="form-control" placeholder="product tax">
                                 </div>
                                        <div class="col-md-2 mb-3">
                                            <button class="btn btn-danger remove_item_btn">1</button>
											<button class="btn btn-primary remove_item_btn">2</button>
											
											</div>
									 </div>`);
            
        });
        $(document).on('click','.remove_item_btn',function(e){
            e.preventDefault();
            let row_counter=$(this).parent().parent();
            $(row_counter).remove();
        });
    });
</script>
@endsection