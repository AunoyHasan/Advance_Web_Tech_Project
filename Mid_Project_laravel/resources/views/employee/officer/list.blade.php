@extends('employee.layouts.content')
@section('content')
<br>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<center>
<form action="{{route('officer.search')}}" method="GET">
    <input type="text" name="search" placeholder="Search for officer">
    <input type="submit" value="Search">
    <button type="button" name="back"  ><a href="{{route('officer.list')}}"> Reset </a> </button>
</form>
</center>
<br>

<h1 align="center">Officers List</h1>

<center>
<table border="1">
    <tr align="center">
        <th>Name </th>
        <th>Email</th>
        <th>Action</th>

    </tr>
    @foreach($officers as $o)
        <tr align="center">
            <td><a href="{{route('officer.details',['id'=>$o->id+839, 'name'=>$o->name, 'email'=>$o->email, 'address'=>$o->address, 'created_at'=>$o->created_at])}}">{{$o->name}}</a></td>
            <td>{{$o->email}}</td>
            <td>
            <a href="{{route('officer.supplier',['id'=>$o->id])}}"> Name </a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>

@endsection