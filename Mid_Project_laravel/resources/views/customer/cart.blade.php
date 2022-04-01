@extends('layout.homeLayout')
@section('content')
	<table border=1 name="2">
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Product Cost</th>
        <th>Order</th>
        <th>Delete Form Cart</th>
		@foreach($products as $p)
        <tr name="2">
                <td>{{$p->pname}}</td>
                <td>{{" ".$p->quantity}}</td>
                <td>{{$p->price}}</td>
                <form method="post" action="{{route('order')}}">
                @csrf
                    <input type="hidden" name="id" value="{{$p->id}}">
                    <input type="hidden" name="pname" value="{{$p->pname}}">
                    <input type="hidden" name="price" value="{{$p->price}}">
                    <input type="hidden" name="customerId" value="{{$p->customerId}}">
                    <input type="hidden" name="quantity" value="{{$p->quantity}}">
                    <td><input type="submit" name="submit" value="Order"></td>
                    <td><input type="submit" name="delete" value="Cancel"></td>
                </form>
        </tr>
		@endforeach
	</table>
    @if($totalPrice>0)<h1 align="center">Total Price: <span style="color:green">{{$totalPrice}}</span> BDT</h1>@endif
@endsection
