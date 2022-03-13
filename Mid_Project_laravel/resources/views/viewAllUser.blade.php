@extends('layout')
@section('content')

<center>


  <div class="tablebody2">

    <form action="{{route('searchCustomer')}}" method="GET">
    <input type="text" name="search"  placeholder="Search for customer..">
    <input type="submit" value="Search">
    </form>

 <h4 class="text-success">All Customer List</h4>
 <h4>
<a href="{{ route('generatePDF_allUser') }}">
     <img src="css/Downloadpdf2.png" height="150px" >
 </a>
 <button type="button" name="back" class="btn btn-success" ><a href="adminDashboard"> <h6>Back to Dashboard</h6> </a>  </button>
</h4>

<h4 class="text-success" >  {{session()->get('msg2')}} </h4>
<h4 class="text-success" >  {{session()->get('msg3')}} </h4>
<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Created_at</th>
        <th>action</th>
    </tr>
    @foreach($users as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
            <td>{{$s->id}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->created_at}}</td>


            <td>
                  <button class="btn btn-danger"><a href="{{route('userDelete', ['id' => $s->id])  }}">Delete</button>

            </td>
        </tr>
    @endforeach
</table>
  </div>
</center>
@endsection
