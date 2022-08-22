@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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


				{{-- Message --}}
				@if (Session::has('success'))
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-times"></i>
						</button>
						<strong>Success !</strong> {{ session('success') }}
					</div>
				@endif

				@if (Session::has('error'))
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-times"></i>
						</button>
						<strong>Error !</strong> {{ session('error') }}
					</div>
				@endif
				<!-- row -->
				<button class="btn btn-primary">New User</button>
               
				
				<form action="{{route('user.store')}}" method="post">
					@csrf

					<input type="submit" value="Malik" class="btn btn-primary">
				</form>
				<div class="card-body">
				<?php $i=0 ?>
				<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
							</div>
							
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>first name</th>
												<th>last name</th>
												<th>email</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($users as $user)
											<tr>
												<th scope="row">{{++$i}}</th>
												<td>{{$user->first_name}}</td>
												<td>{{$user->last_name}}</td>
												<td>{{$user->email}}</td>
												<td>
													
												    	
												<a href="http://127.0.0.1:8000/" class="btn btn-primary">Profile</a>
		                                            <button class="btn btn-danger"> Delete</button>
													
							    					
													
												</td>
												
											</tr>
											@endforeach
											
										</tbody>

										
									</table>
									<h5>Pagination:</h5>
    								{{ $users->links() }}
								</div>
							</div>


						</div>
					</div>
					
								<div class="table-responsive">
									<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label><select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
										<thead>
											<tr role="row"><th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 172.969px;">First name</th><th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 172.969px;">Last name</th><th class="wd-20p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 243.963px;">Position</th><th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 172.969px;">Start date</th><th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 101.974px;">Salary</th><th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 314.986px;">E-mail</th></tr>
										</thead>
										<tbody>
										
										<tr role="row" class="odd">
												<td class="sorting_1">Adrian</td>
												<td>Terry</td>
												<td>Marketing Officer</td>
												<td>2013/04/21</td>
												<td>$543,769</td>
												<td>a.terry@datatables.net</td>
											</tr><tr role="row" class="even">
												<td class="sorting_1">Angelica</td>
												<td>Ramos</td>
												<td>Chief Executive Officer</td>
												<td>20017/10/15</td>
												<td>$6,234,000</td>
												<td>a.ramos@datatables.net</td>
											</tr><tr role="row" class="odd">
												<td class="sorting_1">Bella</td>
												<td>Chloe</td>
												<td>System Developer</td>
												<td>2018/03/12</td>
												<td>$654,765</td>
												<td>b.Chloe@datatables.net</td>
											</tr><tr role="row" class="even">
												<td class="sorting_1">Brenden</td>
												<td>Wagner</td>
												<td>Software Engineer</td>
												<td>2013/07/14</td>
												<td>$206,850</td>
												<td>b.wagner@datatables.net</td>
											</tr><tr role="row" class="odd">
												<td class="sorting_1">Bruno</td>
												<td>Nash</td>
												<td>Software Engineer</td>
												<td>2015/05/03</td>
												<td>$163,500</td>
												<td>b.nash@datatables.net</td>
											</tr><tr role="row" class="even">
												<td class="sorting_1">Cameron</td>
												<td>Watson</td>
												<td>Sales Support</td>
												<td>2013/9/7</td>
												<td>$675,876</td>
												<td>c.watson@datatables.net</td>
											</tr><tr role="row" class="odd">
												<td class="sorting_1">Connor</td>
												<td>Johne</td>
												<td>Web Developer</td>
												<td>2011/1/25</td>
												<td>$92,575</td>
												<td>C.johne@datatables.net</td>
											</tr><tr role="row" class="even">
												<td class="sorting_1">Dominic</td>
												<td>Hudson</td>
												<td>Sales Assistant</td>
												<td>2015/10/16</td>
												<td>$654,300</td>
												<td>d.hudson@datatables.net</td>
											</tr><tr role="row" class="odd">
												<td class="sorting_1">Donna</td>
												<td>Bond</td>
												<td>Account Manager</td>
												<td>2012/02/21</td>
												<td>$543,654</td>
												<td>d.bond@datatables.net</td>
											</tr><tr role="row" class="even">
												<td class="sorting_1">Evan</td>
												<td>Terry</td>
												<td>Sales Manager</td>
												<td>2013/10/26</td>
												<td>$66,340</td>
												<td>d.terry@datatables.net</td>
											</tr></tbody>
									</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
								</div>
						
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection