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
				<form action="#" method="post" id="form_insert" class="H-100">
				<div class="row">
					<div class="col-lg-12 col-md-12">
					<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Select<span class="tx-sserif">2</span>
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
								<div class="row row-sm mg-b-20">
								<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Single Select with Search</p><select class="form-control select2">
											<option label="Choose one">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Single Select with Search</p><select class="form-control select2">
											<option label="Choose one">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Single Select with Search</p><select class="form-control select2">
											<option label="Choose one">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
									</div><!-- col-4 -->
									
								</div>
								<div class=" mb-1  d-grid">
                                            <button class="btn btn-success add_item_btn w-25">Add</button>
                                        </div> 
							</div>
						</div>
					</div>
				
				</div>
				<div class="row h-75">
					<div class="col-lg-12 col-md-12">
						<div class="card">
						
                                <div class="">
									
								<div>
									<h6 class="card-title p-3">Single Select Style</h6>
									  
                        
						
								</div>  
                        </div>
							<div class="card-body">
							<div id="show_item">
                            <div class="row">
							
							</div>
						</div>
						 <div class=" mb-1  d-grid">
                            
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
											<button class="btn btn-primary add_item_btn">2</button>
											
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