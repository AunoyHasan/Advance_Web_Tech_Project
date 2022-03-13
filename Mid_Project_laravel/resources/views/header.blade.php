<div id="header"  align="center"  >

    {{--  <p id="name">ONLINE SHOP</p>
      @if ((!Session::has('username')) && (!Session::has('name')) ) <a href="KREDOY416@gmail.com" target="_blank"><p id="email">KREDOY416@gmail.com</p></a> @endif
      @if((Session::has('username')|(Session::has('name'))))
      <a id="email" href="{{route('adminlogout')}}">Logout</a>
      @endif

      <a href="/adminDashboard">Admin-Dashboard</a>
      <a href="/regis">Go To Admin-Registration</a>
      <a href="{{route('viewAllAdmin')}}">All-Admins</a>
      <a href="{{route('viewAllProducts')}}">All-Products</a>
      <a href="{{route('viewAllUser')}}">All-Customers</a>--}}

<table>
  <tr>
    <td id="nav" ><p id="name">ONLINE SHOP</p></td>
    <td id="nav">  <a href="/regis">Go To Admin-Registration</a></td>
    <td id="nav"><a href="/adminDashboard">Admin-Dashboard</a></td>
    <td id="nav">  <a href="{{route('viewAllAdmin')}}">All-Admins</a></td>
    <td id="nav"><a href="{{route('viewAllProducts')}}">All-Products</a></td>
    <td id="nav"><a href="{{route('viewAllUser')}}">All-Customers</a></td>
    <td id="nav"><a href="{{route('viewAllPerformance')}}">All-Performances Records</a></td>
    <td id="nav"><a href="{{route('addPerformance')}}">Add-Performances</a></td>

    <td id="nav">
    @if ((!Session::has('username')) && (!Session::has('name')) ) <a href="KREDOY416@gmail.com" target="_blank"><p id="email">KREDOY416@gmail.com</p></a> @endif
    @if((Session::has('username')|(Session::has('name'))))
    <a id="email" href="{{route('adminlogout')}}">Logout</a>
    @endif</td>
  </tr>
</table>
</div>
