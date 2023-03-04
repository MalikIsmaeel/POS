<!DOCTYPE html>

<html>

<head>
    <title>{{ $title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>{!! $qr_image !!}</p>
    <p>hafid mart</p>
    <p>Riyadh</p>
    <p>olya</p>
    <p>Vat : 1234567891011</p>
    <p>0155332015</p>
    <p>simple Tax invoice</p>
    <table class="table mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>product</th>
												<th>price</th>
												<th>qty</th>
                                                <th>subtotal</th>
                                                <th>vat</th>
                                                <th>tot/vat</th>
											</tr>
										</thead>
										<tbody>
											
												@foreach ($entity as $product)
                                                <tr>
												<th scope="row">1</th>
                                             <td>product . {{$product['id']}}</td>
                                            <td>{{$product['cost']}}</td>
                                            <td>{{$product['qty']}}</td>
                                            <td>{{$product['sub_total']}}</td>
                                            <td>{{$product['cost'] * $product['qty']*0.15}}</td>
                                            <td>{{($product['cost'] *$product['qty'] * 0.15)+$product['sub_total']}}</td>
                                            </tr>
                                            @endforeach
											
											
										</tbody>
									</table>
                                    <table>
                                        <tr><td>total</td><td>{{$total}}</td></tr>
                                        <tr><td>vat</td><td>{{$total_vat}}</td></tr>
                                        <tr><td>total with vat</td><td>{{$total_with_vat}}</td></tr>
                                    </table>
</body>
<script>
        window.print();
    
    
</script>
</html>