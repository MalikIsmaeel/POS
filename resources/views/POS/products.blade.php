             @foreach ($products as $entity)
										<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
											<div class="card">
												<div class="card-body">
													<div class="pro-img-box">
														<div class="d-flex product-sale">
															<i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
														</div>
														<img class="w-100" src="{{URL::asset('assets/img/ecommerce/02.jpg')}}" alt="product-image" id="{{$entity->id}}" onclick="add_to_cart($entity->id)">
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
										@endforeach<div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
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
														<h6 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">ADD</h6>
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
									