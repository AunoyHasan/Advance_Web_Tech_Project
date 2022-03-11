@extends('layout')
@section('content')
<center>

<br>
<br>
<div class="dashAllbody">



<h4 class="text-success">  {{session()->get('msg')}} </h4>

@if(session()->has('username'))
     <img src="{{asset($admin->pro_pic)}}" width="180px" height="150px" style="margin-top: 50px" >
     <h4 class="text-danger"> hello, {{session()->get('username')}} !</h4>
 @endif

 @if(session()->has('name'))

      {{--<img src="{{ asset(Auth::user()->avatar)}}" width="180px" height="150px" style="margin-top: 50px" >--}}
      <img src="css/admintxt.png" alt=""  height="70px" width="150px">
      <br>
      <img src="css/adminicon.png" alt=""  height="120px" width="140px" >
      <h4 class="text-primary"> hello, {{session()->get('name')}} !</h4>
      <h4 class="text-danger"> YOU ARE NOW LOGGED IN WITH GOOGLE ACCOUNT!</h4>
  @endif



<h4 class="text-success"> WELLCOME IN ADMIN DASHBOARD</h4>
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
                  <li>Number of total admins:- ({{$allAdmin}})</li>
                  <li>Edit Admin info</li>
                  <li>Remove Admin</li>
                </ul>
              </td>
              <td id="dashboard">
              <h5> <a href="">VIEW ALL-CATEGORIES</a> </h5>
                <ul>
                  <li>Number of total categories-></li>
                  <li>Edit categories info</li>
                  <li>Remove categories</li>
                </ul>
              </td>
          </tr>

           <tr>
               <td id="dashboard"><h5><a href="">Add new category</a> </h5></td>
               <td id="dashboard"><h5><a href="">View all-employee</a></h5></td>
               <td id="dashboard"><h5><a href="">View all-products</a></h5></td>
           </tr>


  </table>
</p>
</div>
</center>
@endsection
@section('demo2')
@include('chart')

@endsection
