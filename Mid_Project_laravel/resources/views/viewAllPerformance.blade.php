@extends('layout')
@section('content')

<center>

  <div class="tablebody2">



 <h4 class="text-success">All Company Performances List</h4>
 <h4>
<button type="button" name="back" class="btn btn-success" ><a href="addPerformance"> <h6>Add Company Performances</h6> </a>  </button>
 <button type="button" name="back" class="btn btn-success" ><a href="adminDashboard"> <h6>Back to Dashboard</h6> </a>  </button>

</h4>
<h4 class="text-success" >  {{session()->get('msg2')}} </h4>
<h4 class="text-success" >  {{session()->get('msg3')}} </h4>
<h4 class="text-success" >  {{session()->get('msg4')}} </h4>
<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Year</th>
        <th>Sales</th>
        <th>Expenses</th>
        <th>action</th>
    </tr>
    @foreach($perf as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
            <td>{{$s->id}}</td>
            <td>{{$s->Year}}</td>
            <td>{{$s->Sales}}</td>
            <td>{{$s->Expenses}}</td>

            <td>

                    <button class="btn btn-danger"><a href="{{route('performaneDelete', ['id' => $s->id])  }}">Delete</button>

            </td>
        </tr>
    @endforeach
</table>
  </div>
</center>
@endsection
