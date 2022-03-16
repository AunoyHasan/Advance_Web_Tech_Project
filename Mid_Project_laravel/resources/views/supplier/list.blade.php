@extends('employee.layouts.content')
@section('content')
<br>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<center>
<form action="{{route('supplier.search.officer')}}" method="GET">
    <input type="text" name="search" placeholder="Search for supplier">
    <input type="submit" value="Search">
    <button type="button" name="back"  ><a href="{{route('supplier.list.officer')}}"> Reset </a> </button>
</form>
</center>
<br>

<h1 align="center">Supplier List</h1>
<center>


<table border="1">
    <tr align="center">
        <th>Name </th>
        <th>Email</th>
        <th>Salary</th>
        <th>Action</th>

    </tr>
    @foreach($supplier as $o)
        <tr align="center">
            <td>{{$o->name}}</td>
            <td>{{$o->email}}</td>
            <td>{{$o->salary}}</td>
            <td>
            <a class="btn btn-primary" href="abc">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>

@endsection