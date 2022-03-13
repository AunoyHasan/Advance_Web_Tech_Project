@extends('layout')
@section('content')
<br>
<br>
<center>

<div class="tablebody2">


<h4 align="center">YOU ARE WELLCOME !</h4>
<h4 class="text-success" >  {{session()->get('msg4')}} </h4>
<form action="addPerformance_submit" method="POST" >
{{csrf_field()}}
<p>
  <table border="1" align="center">

    <tr>
        <th></th>
        <th></th>

    </tr>
    <tr>
        <td >
          <span>Year </span>
        </td>

        <td >
         :<input type="text"  name="Year" value="{{old('Year')}}" placeholder="Year..">
         @error('Year')
         <span class="btn btn-danger"> {{$message}}</span>
         @enderror
        </td>
    </tr>
    <tr>
        <td >
          <span>Sales </span>
        </td>

        <td >
         :<input type="text"  name="Sales" value="{{old('Sales')}}" placeholder="Sales..">
         @error('Sales')
         <span class="btn btn-danger"> {{$message}}</span>
         @enderror
        </td>
    </tr>
    <tr>
        <td>
          <span>Expenses </span>
        </td>
        <td>:<input type="text"  name="Expenses" value="{{old('Expenses')}}" placeholder="Expenses..">
          @error('Expenses')
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
            <button type="button" name="back"  ><a href="viewAllPerformance" > <h6>Performances List</h6> </a>  </button>
        </form>
        </div>
      </center>
    </body>


@endsection
