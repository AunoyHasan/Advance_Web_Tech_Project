@extends('layout')
@section('content')
<br>
<br>

<br>
<h4 align="center"> EDIT YOUR REQUIRED FIELDS!</h4>
<form action="{{route('adminEditSubmit')}}" method="POST"  enctype="multipart/form-data">
{{csrf_field()}}
<p>


  <input type="hidden"  name="id" value="{{$admin->id}}" >
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

         :<input type="text"  name="name" value="{{$admin->name}}" placeholder="name">

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
         :<input type="text"  name="username" value="{{$admin->username}}" placeholder="username">
         @error('username')
         <span class="btn btn-danger"> {{$message}}</span>
         @enderror
        </td>
    </tr>
    <tr>
        <td>
          <span>email </span>
        </td>
        <td>:<input type="email"  name="email" value="{{$admin->email}}" placeholder="email">
          @error('email')
          <span class="btn btn-danger"> {{$message}}</span>
          @enderror
        </td>
    </tr>
    <tr>
          <td>
            <span>Gender </span>
          </td>
          <td> :<input type="radio" name="gender" value="Male" <?php if($admin->gender=='Male'){echo 'checked';} ?> >Male<input type="radio" name="gender" value="Female" <?php if($admin->gender=='Female'){echo 'checked';} ?> >Female
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
          <img src="{{asset($admin->pro_pic)}}" alt="" height="100px" width="100px">
          @error('pro_pic')
          <span class="btn btn-danger"> {{$message}}</span>
          @enderror
        </td>
    </tr>


            <tr >

                <td ><input type="submit" class="btn btn-success"value="Submit">
                </td>

            </tr>


            </table>

        </form>



@endsection
