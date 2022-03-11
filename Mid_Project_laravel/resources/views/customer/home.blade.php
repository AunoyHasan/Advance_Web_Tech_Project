@extends('layout.homeLayout')
@section('content')
@php
$column=0;
@endphp
	<table border=0 name="2">
        <tr name="2">
		@foreach($products as $p)
            @php $column+=1;   @endphp
                <td><img src="{{asset('/item/'.$p->picture)}}" height=200px width=200px><br>{{$p->pname}}{{" ".$p->quantity}}<br>{{$p->price}}</td>
            @php if($column==3) echo "</tr> <tr>";  @endphp
            @php if ($column==3)$column=0;   @endphp
		@endforeach
	</table>
@endsection
