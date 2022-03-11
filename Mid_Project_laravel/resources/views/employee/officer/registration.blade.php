@extends('employee.layouts.logreg')
<br><br>    
<center>   
    <h3>Regiatration</h3> 
    <form action="{{route('register.submit')}}" method="post">
    <div class="col-md-4">
        {{csrf_field()}}
       
        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name"><br>
        @error('name')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
       
        <input type="password" name="password" class="form-control" placeholder="Password"><br>
        @error('password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="password" name="conf_password" class="form-control" placeholder="Confirm Password"><br>
        @error('conf_password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email"><br>
        @error('email')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="Address"><br>
        @error('address')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Registration">

</div>    

    </form>
</center>    