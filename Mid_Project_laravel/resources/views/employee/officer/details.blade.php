@extends('employee.layouts.content')
@section('content')
<br><br>

<a href={{route('officer.home')}} class="btn btn-primary">Home</a>
    <h1 align="center">Details of {{$name}}</h1>
    <center>
    <table border="1">
    <tr align="center">
        <th>Name</th>
        <th>Id</th>
        <th>Email</th>
        <th>Address</th>
        <th>Registration Date</th>
    </tr>
    <tr align="center">
        <td>{{$name}}</td>
        <td>{{$id}}</td>
        <td>{{$email}}</td>
        <td>{{$address}}</td>
        <td>{{$created_at}}</td>
    </tr>
</table>
    </center>
    <br><br>
@endsection