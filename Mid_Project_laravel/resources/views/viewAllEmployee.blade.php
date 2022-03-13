@extends('layout')
@section('content')

<center>


  <div class="tablebody2">
<form action="{{route('searchEmployee')}}" method="GET">
      <input type="text" name="search"  placeholder="Search for empolyee..">
      <input type="submit" value="Search">
</form>
 <h4 class="text-success">All Employees List</h4>
 <h4>
 <a href="{{ route('generatePDF_allEmployee') }}">
     <img src="css/Downloadpdf.png" height="100px" >
 </a>
 <button type="button" name="back" class="btn btn-success" ><a href="adminDashboard"> <h6>Back to Dashboard</h6> </a>  </button>
</h4>
<h4 class="text-success" >  {{session()->get('msg2')}} </h4>
<h4 class="text-success" >  {{session()->get('msg3')}} </h4>
<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Officer_Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>Address</th>
        <th>action</th>
    </tr>
    @foreach($employees as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
            <td>{{$s->id}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->salary}}</td>
            <td>{{$s->address}}</td>


            <td>

                    <button class="btn btn-danger"><a href="{{route('employeeDelete', ['id' => $s->id])  }}">Delete</button>

            </td>
        </tr>
    @endforeach
</table>
  </div>
</center>
@endsection
