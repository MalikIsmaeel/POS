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
                       										 <button class="btn btn-danger btn-sm deleteRecord" id="{{$id}}" onclick="delete_record ({{$id}})"><i class="fa fa-trash"></i></button>
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
		@section('script')
		
$(".deleteRecord").click(function (){
	<script>
	
</script>
		@endsection