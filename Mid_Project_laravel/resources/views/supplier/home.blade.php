@extends('employee.layouts.loggedin')
@section('content')

<h1 align="center">Welcome Supplier Home</h1>

<br><br>
<table border="1" align="center">

            <tr>
                <td> 
                    <a href="{{route('supplier.list')}}" class="btn btn-primary"> List </a> 
                </td>
            </tr>

</table>
            

@endsection