
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
											@php $total += ($details['cost'] * $details['qty']*0.15)+$details['cost'] * $details['qty'] @endphp
											@php $vat += $details['cost'] * $details['qty']*0.15 @endphp
											@php $total_with_vat += ($details['cost'] * $details['qty']*0.15)+$details['cost'] * $details['qty'] @endphp
												<tr>
												<tr data-id="{{ $id }}">
												<td>
													 {{$details['product_name']}}
														</td>
														<td>{{$details['cost']}}</td>
														<td>
														<div class="form-group d-flex">
														<button class="btn  btn-sm deleteRecord" id="{{$id}}" onclick="update_record ({{$id}},'+')"><i class="far fa-arrow-alt-circle-right"></i></button>
														{{$details['qty']}}		
														<button class="btn  btn-sm deleteRecord" id="{{$id}}" onclick="update_record ({{$id}},'-')"><i class="far fa-arrow-alt-circle-left"></i></button>
        
															
																</div>
														</td>
														<td class="text-center text-lg text-medium">{{$details['qty']*$details['cost']}}</td>
														<td class="text-center text-lg text-medium">{{$details['qty']*$details['cost']*0.15}}</td>
														<td class="text-center text-lg text-medium">{{($details['qty']*$details['cost']*0.15)+$details['qty']*$details['cost']}}</td>
														<td class="text-center">
														
														 <td class="actions" data-th="">
														 <meta name="csrf-token" content="{{ csrf_token() }}">
                       										 <button class="btn btn-danger btn-sm deleteRecord" id="{{$id}}" onclick="delete_record ({{$id}})"><i class="fa fa-trash"></i></button>
																  </td>
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
								<td style="margin-right:15px"><input type="text" name="vat" id="" value="{{$vat}}" readonly></td>
						  </tr>
						  <tr>
								<td>
                                   <h6>Total with vat</h6>
								</td>
								<td style="margin-right:10px"><input type="text" name="total_with_vat" id="" value="{{$total_with_vat}}" readonly></td>
						  </tr>
						 </table>
								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
							</div>
							</form>
						</div>