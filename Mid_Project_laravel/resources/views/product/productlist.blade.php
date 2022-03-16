@extends('employee.layouts.content')
@section('content')
<br><br>

<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>

<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>

<center>
    
<form action="{{route('product.search')}}" method="GET">
<a href="{{route('product.addproduct')}}" class="btn btn-primary"> Add Product</a>
    <input type="text" name="search" placeholder="Search for product..">
    <input type="submit" value="Search">
    <button type="button" name="back"  ><a href="{{route('product.list')}}"> Reset </a> </button>
</form>
</center>

<h1 align="center">Product List</h1>
<br>
<center>
<table border="1">
    <tr align="center">
        <th>Prodict_Name </th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Action</th>

    </tr>
    @foreach($products as $o)
        <tr align="center">
            <td>{{$o->pname}}</a></td>
            <td>{{$o->quantity}}</td>
            <td>{{$o->price}}</td>
            <td>{{$o->category}}</td>
            <td> <img src="{{asset($o->picture)}}" height="100px" width="100px" > </td>

            <td>
                <a class="btn btn-primary" href="{{route('product.edit.abc',['id'=>$o->id])}}">Edit</a>
                <a class="btn btn-primary" href="{{route('product.delete',['id'=>$o->id])}}">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>

@endsection