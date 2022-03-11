<div id="header"  align="center"  >

      <p id="name">ONLINE SHOP</p>
      @if ((!Session::has('username')) && (!Session::has('name')) ) <a href="KREDOY416@gmail.com" target="_blank"><p id="email">KREDOY416@gmail.com</p></a> @endif
      @if((Session::has('username')|(Session::has('name'))))
      <a id="email" href="{{route('adminlogout')}}">Logout</a>
      @endif

      <a href="/adminDashboard">Admin-Dashboard</a>
      <a href="/regis">Go To Admin-Registration</a>
      <a href="{{route('viewAllAdmin')}}">All-Admins</a>


</div>
