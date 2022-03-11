@extends('employee.layouts.logreg')
<br><br>
<center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br><br>@endif
    <br>
    <form action="{{route('login.submit')}}" method="post">
        <div class="col-md-4">
            {{csrf_field()}}
            <h3>Login</h3>
            <input type="text" class="form-control" name="name" placeholder="Name"><br>
            <input type="password" name="password" class="form-control" placeholder="Password"><br>
        
            <a href="" class="btn btn-primary"> Forgot Password </a>
            <input type="submit" class="btn btn-primary" value="Login">
        </div>    
    </form>
</center>