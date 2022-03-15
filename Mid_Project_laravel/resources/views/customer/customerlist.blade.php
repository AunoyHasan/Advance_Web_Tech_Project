@extends('employee.layouts.content')
@section('content')
<br>

<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>

<center>
<h4 class="text-success">All Customer List</h4> <br>
<table border="1">
    <tr align="center">
        <th>Id</th>
        <th>Username</th>
        <th>Registration Date</th>
        <th align="center">Action</th>
    </tr>
    @foreach($customers as $s)
        <tr align="center">
            <td>{{$s->id}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->created_at}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('customer.delete',['id'=>$s->id])}}">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
  </div>
</center>
@endsection