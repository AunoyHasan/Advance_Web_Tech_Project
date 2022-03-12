@extends('employee.layouts.content')
@section('content')
<br><br>

<center>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a>
</center>

    <h1 align="center">Welcome {{$name}} to visit your profile</h1>
<center>    
    <table border="1">
        
        <tr>
            <th>Name</th>
            <td>{{$name}}</td>
        </tr> 
    
        <tr>   
            <th>Id</th>
            <td>{{$id}}</td>
        </tr>
    
        <tr>
            <th>Email</th>
            <td>{{$email}}</td>
        </tr>
    
        <tr>    
            <th>Address</th>
            <td>{{$address}}</td>
        </tr>
    
        <tr>    
            <th>Registration Date</th>
           <td>{{$created_at}}</td>
        </tr>
    </table>
</center>
    <br><br>
@endsection

