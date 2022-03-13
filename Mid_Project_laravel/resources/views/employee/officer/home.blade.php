@extends('employee.layouts.loggedin')
@section('content')

<table border="1">
            <tr> 
                <td> 
                    <a href="{{route('officer.logout')}}"> Admin Panel</a> 
                </td>
            </tr>
            
            <tr>
                <td> 
                    <a href="{{route('officer.list')}}"> Officer Pannel</a> 
                </td>
            </tr>

        
            <tr>
                 <td> 
                 <a href="{{route('officer.profile',['id'=>$of->id+839, 'name'=>$of->name, 'email'=>$of->email, 'address'=>$of->address, 'created_at'=>$of->created_at])}}"> Profile</a>
                 </td>
            </tr>
            
            <tr>
                 <td> 
                    <a href="{{route('product.list')}}"> Product Pannel</a>
                 </td>
            </tr>

            <tr>
                 <td> 
                    <a href="{{route('officer.logout')}}"> Currier Pannel</a> 
                </td>
            </tr>

            <tr>
                <td> 
                    <a href="{{route('officer.logout')}}"> Setting </a> 
                </td>
            </tr>

</table>
            

@endsection