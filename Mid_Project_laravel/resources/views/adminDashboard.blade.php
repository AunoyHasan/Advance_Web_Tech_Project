@extends('layout')
@section('content')
<center>
<br>

<div class="dashAllbody">



<h4 class="text-success">  {{session()->get('msg')}} </h4>

@if(session()->has('username'))
                  <br>
                 <img src="{{asset($admin->pro_pic)}}" width="180px" height="150px" style="margin-top: 50px" >
                 <h4 class="text-danger"> hello, {{session()->get('username')}} !</h4>
 @endif


 @if(session()->has('name'))

                {{--<img src="{{ asset(Auth::user()->avatar)}}" width="180px" height="150px" style="margin-top: 50px" >--}}
                <br>
                <img src="css/admintxt.png" alt=""  height="70px" width="150px">
                <br>
                <img src="css/adminicon.png" alt=""  height="120px" width="140px" >
                <h4 class="text-primary"> hello, {{session()->get('name')}} !</h4>
                <h4 class="text-danger"> YOU ARE NOW LOGGED IN WITH GOOGLE ACCOUNT!</h4>
  @endif


<br>
<h4 class="text-success"> WELLCOME IN ADMIN DASHBOARD</h4>
<br>
<br>
<p>
  <table  border="1">



          <tr >
                 <td id="dashboard">
                  <h5><a href="{{route('registration')}}">GO TO ADMIN REGISTRATION</a></h5>
                   <ul>
                     <li>Add new Admin</li>
                   </ul>
                 </td>



              <td id="dashboard">
                <h5><a href="{{route('viewAllAdmin')}}">VIEW ALL-ADMINS</a></h5>
                <ul>
              <li><h5>Number of total admins:- ({{$allAdmin}})</h5></li>
                  <li>View all-Admin profile</li>
                  <li>Edit Admin info</li>
                  <li>Remove Admin</li>
                </ul>
              </td>
              <td id="dashboard">
              <h5> <a href="{{route('viewAllUser')}}">VIEW ALL-USERS</a> </h5>
                <ul>
                  <li> <h5>Number of total users:- ({{$userCount}})</h5> </li>
                  <li>View all-users profile</li>
                  <li>Remove user</li>
                </ul>
              </td>
          </tr>

           <tr>
               <td id="dashboard"><h5><a href="{{route('viewAllPerformance')}}">Handle Company Performance</a> </h5>
                 <ul>
                   <li> Add Company Performances </li>
                   <li> View all Performances</li>
                   <li>Remove Performances</li>
                 </ul>
               </td>
               <td id="dashboard"><h5><a href="{{route('viewAllEmployee')}}">View all-employee</a></h5>
                 <ul>
                   <li> <h5>Number of total Employees:- ({{$employeeCount}})</h5> </li>
                   <li>View all-employees profile</li>
                   <li>Remove employee</li>
                 </ul>
               </td>
               <td id="dashboard">
                 <h5><a href="{{route('viewAllProducts')}}">View all-products</a></h5>
                 <ul>
                   <li> <h5>Number of available Products:- ({{$productCount}})</h5> </li>
                   <li>View details of Product</li>
                   <li>Remove Product</li>
                 </ul>
               </td>
           </tr>


  </table>
</p>
</div>
</center>
@endsection
@section('demo2')
@include('chart')

@endsection
