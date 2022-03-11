@extends('layout')
@section('content')
<center>



<h4 align="center" class="text-success" style="padding-top:60px;">{{session()->get('msg4')}}</h4>
<div id="loginbody">
<form action="adminLoginSubmit" method="POST" style="padding-top:50px;" >
{{ csrf_field() }}
<p>

  <img src="css/admintxt.png" alt=""  height="70px" width="150px">
  <br>
  <img src="css/adminicon.png" alt=""  height="120px" width="140px" styl>


  <table border="1" align="center" >



    <tr>
        <td >
          <span>username </span>
        </td>

        <td >
         :<input type="text"  name="username" value="{{old('username')}}" placeholder="username">
         @error('username')
         <span class="btn btn-danger"> {{$message}}</span>
         @enderror
        </td>
    </tr>


    <tr>
        <td>
          <span>password </span>
        </td>
        <td> :<input type="password" name="password" value="{{old('password')}}"  >
          @error('password')
          <span class="btn btn-danger"> {{$message}}</span>
          @enderror
        </td>
    </tr>

            <tr >
                <td ><input type="submit" class="btn btn-success" value="Login">
                </td>
                <td >  <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" >
                </a>
                </td>
            </tr>


            </table>
        </form>
  </div>
      </center>


@endsection
