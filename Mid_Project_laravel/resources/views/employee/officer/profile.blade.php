@extends('employee.layouts.content')
@section('content')
<br><br>
    <h1 align="center">Welcome {{$name}} to visit your profile</h1>
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

