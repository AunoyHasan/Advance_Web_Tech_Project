@extends('employee.layouts.content')
<br><br>    
<center>   
    <h3>Regiatration</h3> 
    <form action="{{route('register.submit')}}" method="post">
        {{csrf_field()}}
       
        <input type="text" name="name" value="{{old('name')}}" placeholder="Name"><br>
        @error('name')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
       
        <input type="password" name="password" placeholder="Password"><br>
        @error('password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="password" name="conf_password" placeholder="Confirm Password"><br>
        @error('conf_password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="email" value="{{old('email')}}" placeholder="Email"><br>
        @error('email')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="address" value="{{old('address')}}" placeholder="Address"><br>
        @error('address')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <br>
        <input type="reset" value="Reset">
        <input type="submit" value="Registration">

    </form>
</center>    