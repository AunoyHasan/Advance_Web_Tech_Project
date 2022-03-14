@extends('layout.homeLayout')
@section('content')
@php
$column=0;
@endphp
{{session()->get('id')}}
{{session()->get('username')}}
{{session()->get('email')}}
	<table border=0 name="2">
        <tr name="2">
		@foreach($products as $p)
            @php $column+=1;   @endphp
            <form action="{{route('addtocart')}}" method="post">
            @csrf
            <input type="hidden" name="pname" value="{{$p->pname}}">
            <input type="hidden" name="id" value="{{$p->id}}">
            <input type="hidden" name="quantity" value="{{$p->quantity}}">
            <input type="hidden" name="price" value="{{$p->price}}">
                <td><img src="{{asset('/item/'.$p->picture)}}" height=200px width=200px><br>{{$p->pname}}{{" ".$p->quantity}}<br>{{$p->price}}<br><input type="submit" name="submit" value="Add to Cart"></td>
            </form>
            @php if($column==3) echo "</tr> <tr>";  @endphp
            @php if ($column==3)$column=0;   @endphp
		@endforeach
	</table>
@endsection
