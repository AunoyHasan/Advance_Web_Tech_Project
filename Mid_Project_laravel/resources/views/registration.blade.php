@extends('layout')
@section('content')
<br>
<br>
<center>

<div class="tablebody2">


<h4 align="center">YOU ARE WELLCOME TO ADMIN REGISTRATION!</h4>
<form action="registration_submit" method="POST"  enctype="multipart/form-data">
{{csrf_field()}}
<p>
  <table border="1" align="center">

    <tr>
        <th></th>
        <th></th>

    </tr>
    <tr>
        <td >
          <span>Admin-name </span>
        </td>

        <td >
         :<input type="text"  name="name" value="{{old('name')}}" placeholder="name">
         @error('name')
         <span class="btn btn-danger"> {{$message}}</span>
         @enderror
        </td>
    </tr>
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
          <span>email </span>
        </td>
        <td>:<input type="email"  name="email" value="{{old('email')}}" placeholder="email">
          @error('email')
          <span class="btn btn-danger"> {{$message}}</span>
          @enderror
        </td>
    </tr>
    <tr>
        <td>
          <span>Gender </span>
        </td>
        <td> :<input type="radio" name="gender"  value="Male" <?php if(old('gender')=='Male'){echo 'checked';} ?> >Male
          <input type="radio" name="gender"  value="Female" <?php if(old('gender')=='Female'){echo 'checked';} ?> >Female
          @error('gender')
          <span class="btn btn-danger"> {{$message}}</span>
          @enderror
        </td>
    </tr>
    <tr>
        <td>
          <span>Image </span>
        </td>
        <td> :<input type="file"  name="pro_pic"   >
          @error('pro_pic')
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
    <tr>
        <td>
          <span>Confirm password </span>
        </td>
        <td> :<input type="password" name="conf_password" value="{{old('conf_password')}}"  >
          @error('conf_password')
          <span class="btn btn-danger"> {{$message}}</span>
          @enderror
        </td>
    </tr>
            <tr >
                <td ><input type="submit" class="btn btn-success" value="Submit">
                </td>
            </tr>


            </table>
            <button type="button" name="back" class="btn btn-success" ><a href="adminDashboard"> <h6>Back to Dashboard</h6> </a>  </button>
        </form>
        </div>
      </center>
    </body>


@endsection
