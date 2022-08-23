
<!--  -->
<!--  -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		<!-- Title -->
<title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>
<!-- Favicon -->
<link rel="icon" href="http://127.0.0.1:8000/assets/img/brand/favicon.png" type="image/x-icon"/>
<!-- Icons css -->
<link href="http://127.0.0.1:8000/assets/css/icons.css" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="http://127.0.0.1:8000/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="http://127.0.0.1:8000/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="http://127.0.0.1:8000/assets/css-rtl/sidemenu.css">
<!--- Style css -->
<link href="http://127.0.0.1:8000/assets/css-rtl/style.css" rel="stylesheet">
<!--- Dark-mode css -->
<link href="http://127.0.0.1:8000/assets/css-rtl/style-dark.css" rel="stylesheet">
<!---Skinmodes css-->
<link href="http://127.0.0.1:8000/assets/css-rtl/skin-modes.css" rel="stylesheet">	</head>

	<body class="main-body">
		<!-- Loader -->
		<div id="global-loader">
			<img src="http://127.0.0.1:8000/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		<!-- main-sidebar -->

<!-- main-sidebar -->
		
		<!-- main-content -->
		<div class=" mr-2 ml-3 mt-5">
		@include('layouts.main-header');
	
    
 
			

				
			<!-- container -->
			<div class="d-flex flex-column mt-5">
		
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


					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									تسجيل مستخدم جديد
								</div>
								<p class="mg-b-20">لا تحمل هم الخطوات فقط املاء الخانات تبعا</p>
								<div id="wizard3">
									<h3>المعلومات الاساسية</h3>
									<section>
									<form action="{{route('user.store')}}" method="post">
										@csrf
										<div class="d-flex">
											<div class="col justify-content-left">
											<div class="control-group form-group mr-5">
												<label class="form-label">  الاسم الاول</label>
												<input type="text"  name ='first_name' class="form-control required" required placeholder="الاول">
											</div>
											<div class="control-group form-group mr-5">
												<label class="form-label"> الاسم الاوسط</label>
												<input type="text" name="imd_name" class="form-control required" required placeholder="الثاني">
											</div>
											<div class="control-group form-group mr-5">
												<label class="form-label"> الاسم الاخير</label>
												<input type="text" name="last_name" class="form-control"  required placeholder="الثالث">
											</div>
											<div class="control-group form-group mr-5">
												<label class="form-label"> السكن</label>
												<input type="text" name="address" class="form-control"  required placeholder="الثالث">
											</div>
											
											<div class="control-group form-group mr-5">
												<label class="form-label"> رقم الهاتف</label>
												<input type="text" name="phone" class="form-control"  required placeholder="الثالث">
											</div>
											<div class="control-group form-group mr-5">
												<label class="form-label">البريد الالكتروني</label>
												<input type="email" name="email" class="form-control required" autofill='false' required placeholder="البريد الالكتروني">
											</div>
											<div class="control-group form-group mr-5">
												<label class="form-label">  إسم المستخدم</label>
												<input type="text"  name ='user_name' class="form-control required" required placeholder="الاول">
											</div>
											<div class="control-group form-group mr-5">
													<label class="form-label">كلمة المرور</label>
													<input type="password" class="form-control " name="password" required placeholder="كلمة المرور ">
											</div>
												
											<div>
													<input type="submit" class='btn btn-primary' value="حفظ">
											</div>
											<!-- 'email'=>$request->email,
            // input('Malik@gmail.com'),
           
            'password' =>Hash::make($request->password),
            // input('123456'), // password
           'address'=>$request->address,
            'user_name'=>$request->user_name,
            'first_name' =>$request->f_name,
            'meddile_name'=>$request->imd_name,
            'last_name'=>$request->ls_name, -->
										<!-- </div>
										</div>
										<div class="control-group form-group ">
											<label class="form-label">البريد الالكتروني</label>
											<input type="email" class="form-control required" placeholder="البريد الالكتروني">
										</div>
										<div class="control-group form-group">
											<label class="form-label">رقم الهاتف</label>
											<input type="number" class="form-control required" placeholder="رقم الهاتف">
										</div>
										<div class="control-group form-group mb-0">
											<label class="form-label">العنوان</label>
											<input type="text" class="form-control" placeholder="السكن">
										</div> -->
										</form>
									</section>
									<!-- <h3>بيانات الحساب</h3>
									<section>
									<div class="control-group form-group ">
												<label class="form-label">البريد الالكتروني</label>
												<input type="email" name="email" class="form-control required" placeholder="البريد الالكتروني">
											</div>
											<div class="control-group form-group">
													<label class="form-label">رقم الهاتف</label>
													<input type="number" class="form-control required" placeholder="رقم الهاتف">
											</div>
												
											<div>
													<input type="submit"   class='btn btn-success' value="save">
											</div>
									</section> -->
									</form>
									<!-- <h3>Payment Details</h3>
									<section>
										<div class="form-group">
											<label class="form-label" >CardHolder Name</label>
											<input type="text" class="form-control" id="name12" placeholder="First Name">
										</div>
										<div class="form-group">
											<label class="form-label">Card number</label>
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search for...">
												<span class="input-group-append">
													<button class="btn btn-info" type="button"><i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
													<i class="fab fa-cc-mastercard"></i></button>
												</span>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="form-group mb-sm-0">
													<label class="form-label">Expiration</label>
													<div class="input-group">
														<input type="number" class="form-control" placeholder="MM" name="expiremonth">
														<input type="number" class="form-control" placeholder="YY" name="expireyear">
													</div>
												</div>
											</div>
											<div class="col-sm-4 ">
												<div class="form-group mb-0">
													<label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
													<input type="number" class="form-control" required="">
												</div>
											</div>
										</div>
									</section> -->
								</div>
							</div>
						</div>
					</div>
				</div>

				



            	<!-- Footer opened -->
	<div class="main-footer ht-40 mt-5">
		<div class="container-fluid pd-t-0-f ht-100p">
			<span>Copyright © 2020 <a href="#">Valex</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span>
		</div>
	</div>
<!-- Footer closed -->
				<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="http://127.0.0.1:8000/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Bundle js -->
<script src="http://127.0.0.1:8000/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ionicons js -->
<script src="http://127.0.0.1:8000/assets/plugins/ionicons/ionicons.js"></script>
<!-- Moment js -->
<script src="http://127.0.0.1:8000/assets/plugins/moment/moment.js"></script>

<!-- Rating js-->
<script src="http://127.0.0.1:8000/assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="http://127.0.0.1:8000/assets/plugins/rating/jquery.barrating.js"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="http://127.0.0.1:8000/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="http://127.0.0.1:8000/assets/plugins/perfect-scrollbar/p-scroll.js"></script>
<!--Internal Sparkline js -->
<script src="http://127.0.0.1:8000/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Scroll bar Js-->
<script src="http://127.0.0.1:8000/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- right-sidebar js -->
<script src="http://127.0.0.1:8000/assets/plugins/sidebar/sidebar-rtl.js"></script>
<script src="http://127.0.0.1:8000/assets/plugins/sidebar/sidebar-custom.js"></script>
<!-- Eva-icons js -->
<script src="http://127.0.0.1:8000/assets/js/eva-icons.min.js"></script>
<!--Internal  Select2 js -->
<script src="http://127.0.0.1:8000/assets/plugins/select2/js/select2.min.js"></script>
<!-- Internal Jquery.steps js -->
<script src="http://127.0.0.1:8000/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
<script src="http://127.0.0.1:8000/assets/plugins/parsleyjs/parsley.min.js"></script>
<!--Internal  Form-wizard js -->
<script src="http://127.0.0.1:8000/assets/js/form-wizard.js"></script>
<!-- Sticky js -->
<script src="http://127.0.0.1:8000/assets/js/sticky.js"></script>
<!-- custom js -->
<script src="http://127.0.0.1:8000/assets/js/custom.js"></script><!-- Left-menu js-->
<script src="http://127.0.0.1:8000/assets/plugins/side-menu/sidemenu.js"></script>	
	</body>
</html>