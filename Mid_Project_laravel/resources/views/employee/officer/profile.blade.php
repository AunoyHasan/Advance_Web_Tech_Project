@extends('employee.layouts.content')
@section('content')
<br><br>

<center>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a>
</center>
    <h1 align="center">Welcome {{$Officer->name}} to visit your profile</h1>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br><br>@endif
<center>    

    <table>
        <tr>    
            <td> <img src="{{asset($Officer->image)}}" height="200px" width="200px"> </td>
        </tr>
    </table> 
    <br>
    <h3> <a href="{{route('officer.changepic')}}" class="btn btn-primary">Profile Picture Change</a> </h3>
    
    <br><br>
 
    <table border="1">
        <tr>   
            <th>Id</th>
            <td>{{$Officer->id}}</td>
        </tr>
        
        <tr>
            <th>Name</th>
            <td>{{$Officer->name}}</td>
        </tr> 
    
        <tr>
            <th>Email</th>
            <td>{{$Officer->email}}</td>
        </tr>

        <tr>   
            <th>Salary</th>
            <td>{{$Officer->salary}}</td>
        </tr>
    
        <tr>    
            <th>Address</th>
            <td>{{$Officer->address}}</td>
        </tr>
    
        <tr>    
            <th>Registration Date</th>
           <td>{{$Officer->created_at}}</td>
        </tr>

    </table>
    <br>
    <a href="{{route('officer.logout')}}" class="btn btn-primary">Update Profile</a>

</center>
    <br><br>
@endsection

