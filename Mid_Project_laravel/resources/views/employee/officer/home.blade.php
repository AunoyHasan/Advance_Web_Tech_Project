@extends('employee.layouts.loggedin')
@section('content')

<table border="1">
            <tr> 
                <td> <a href="{{route('officer.logout')}}"> Admin Panel  |  </a> </td>
                <td> <a href="{{route('officer.list')}}"> Officer Pannel |  </a> </td>
                <td> <a href="{{route('officer.logout')}}"> Product Pannel | </a> </td>
                <td> <a href="{{route('officer.logout')}}"> Currier Pannel | </a> </td>
                <td> <a href="{{route('officer.logout')}}"> Setting    |    </a> </td>
            </tr>
</table>
            

@endsection