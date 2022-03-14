@extends('employee.layouts.content')
@section('content')
<br>

<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>

<center>
<h4 class="text-success">All Admins List</h4> <br>
<table border="1">
    <tr align="center">
        <th >Name</th>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Image</th>
        <th align="center">Action</th>
    </tr>
    @foreach($admins as $s)
        <tr align="center">
            <td>{{$s->name}}</td>
            <td>{{$s->id}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->gender}}</td>
            <td> <img src="{{asset($s->pro_pic)}}" width="150px" height="100px"></td>
            <td><a href="mail" class="btn btn-primary">Mail</td>
        </tr>
    @endforeach
</table>
  </div>
</center>
@endsection