@extends('employee.layouts.content')
@section('content')
<br>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<br>
<br>
<br>

<h3>Profile PiC Chnage</h3> 
    <form action="{{route('profilepic')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-4">
        {{csrf_field()}}

        Please give Profile Picture
        <input type="file" name="imagec">
        @error('imagec')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <br><br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Chnage">


<br><br>
@endsection