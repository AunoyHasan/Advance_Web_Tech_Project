@extends('employee.layouts.loggedin')
@section('content')

<table border="1" style="margin-top:100px;background-color:cyan;height:350px">
            <tr> 
                <td> 
                    <a href="{{route('viewAllAdmin')}}"> Admin Panel</a> 
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
                    <a href="{{route('customerList')}}"> Customer Pannel</a> 
                </td>
            </tr>

            <tr>
                <td> 
                    <a href="{{route('officer.setting')}}"> Setting </a> 
                </td>
            </tr>

</table>
            

@endsection