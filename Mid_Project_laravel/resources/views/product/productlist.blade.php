@extends('employee.layouts.content')
@section('content')
<br><br>

<a href={{route('officer.home')}} class="btn btn-primary">Home</a>
<a href={{route('officer.home')}} class="btn btn-primary">Back</a>

<h1 align="center">Officers listList</h1>
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
                <a class="btn btn-primary" href="{{route('officer.edit',['id'=>encrypt($o->id)])}}">Edit</a>
                <a class="btn btn-primary" href="{{route('officer.delete',['id'=>encrypt($o->id)])}}">Delete</a>
                <a class="btn btn-primary" href="{{route('officer.mail',['id'=>encrypt($o->id)])}}">Mail</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>

@endsection