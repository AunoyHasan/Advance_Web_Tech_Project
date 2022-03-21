@extends('employee.layouts.logreg')
<br><br>    

<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.setting')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>

<center>
@if(Session::has('msg1'))<span class="alert alert-info" >{{Session::get('msg1')}}</span><br><br>@endif
</center>

<center>   
    <h3>Change Password</h3> 
    <form action="{{route('officer.password')}}" method="post">
    <div class="col-md-4">
        {{csrf_field()}}
       
        <input type="password" name="password" class="form-control" placeholder="Enter Current Password"><br>
        @error('password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
       
        <input type="password" name="new_password" class="form-control" placeholder="Enter New Password"><br>
        @error('new_password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="password" name="conf_password" class="form-control" placeholder="Confirm New Password"><br>
        @error('conf_password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <br><br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Update">

</div>    

    </form>
</center>    