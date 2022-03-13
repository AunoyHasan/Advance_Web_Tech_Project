@extends('layout')
@section('content')

<center>


  <div class="tablebody2">

    <form action="{{route('searchAdmin')}}" method="GET">
    <input type="text" name="search" value="{{$searchVar}}" placeholder="Search for admin..">
    <input type="submit" value="Search">
    <button type="button" name="back" class="btn btn-success" ><a href="viewAllAdmin"> <h6>Reset</h6> </a>  </button>
    </form>

 <h4 class="text-success">All Admins List</h4>
 <h4>
<a href="{{ route('generatePDF_allAdmin') }}">
     <img src="css/Downloadpdf.png" height="100px" >
 </a>

</h4>
<h4 class="text-success" >  {{session()->get('msg2')}} </h4>
<h4 class="text-success" >  {{session()->get('msg3')}} </h4>
<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Image</th>
        <th>action</th>
    </tr>
    @foreach($admin as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
            <td>{{$s->id}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->gender}}</td>
            <td> <img src="{{asset($s->pro_pic)}}" width="150px" height="100px"></td>

            <td>
                    <button class="btn btn-success"><a href="{{ route('adminEdit', ['id' => encrypt($s->id) ] ) }}">edit</button>
                    <button class="btn btn-danger"><a href="{{route('adminDelete', ['id' => $s->id])  }}">Delete</button>

            </td>
        </tr>
    @endforeach
</table>
  </div>
</center>
@endsection
