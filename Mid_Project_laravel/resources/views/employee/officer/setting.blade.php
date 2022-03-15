@extends('employee.layouts.content')
@section('content')
<br>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<br>
<br>
<br>


<h3 align="center"> <a href="{{route('officer.changepassword')}}" class="btn btn-primary">Change Password</a> </h3>


<br><br>
@endsection