<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
    html, body {
      height: 100%;
      margin: 0;
      background: #F1F9F6;
    }

    .full-height {
      height: 170px;
      background: #D1EEE1;
    }
    td.2{
    height: 250px;
    width: 25%;
    }
    table{
    width: 100%;
    }


</style>
</head>
<body>
    <div class="full-height" >
    <table border="0" height=150px>
        <tr>
        <td>
            <img src="{{asset('/logo/1.png')}}" height=150px width=150px>
        </td>
        <td>
            <b><a href="{{route('c.login')}}">Login</a>|
            <a href="{{route('c.registration')}}">Registration</a>|
            <a href="{{route('cart')}}">Go To Cart</a>|
            <a href="{{route('c.home')}}">Home</a>|
            <a href="{{route('piechart')}}">Ordered Chart</a>|
            <a href="{{route('logout')}}" method="post">Logout</a></b>
        </td>
        <td>
                <form method="post" action="{{route('category')}}">
                @csrf
                    <select name="category" id="category" class="2">
                    <option value="ALL" @php if ($category=="ALL") echo "selected"; @endphp>Catagory</option>
                    <option value="ALL" >All Catagory</option>
                    <option value="WATCH" @php if ($category=="WATCH") echo "selected"; @endphp>Watch</option>
                    <option value="OIL" @php if ($category=="OIL") echo "selected"; @endphp>Oil</option>
                    <option value="CLOTH" @php if ($category=="CLOTH") echo "selected"; @endphp>Cloth</option>
                    </select>
                    <input type="submit" name="submit" value="Search By Category">
                </form>
        </td>
        <td>
        <form method="post" action="{{route('search')}}">
        @csrf
            <input type="text" name="search" palceholder="Search Product">
            <input type="submit" name="submit" value="Search">
        </form>
        </td>
        <td>
        <a href="{{route('edit')}}"><img src="{{asset('/'.'profile.png')}}" height=50px width=50px></a>
        <br>{{session()->get('username')}}<br>
        
        </td>
        </tr>

    </table>
      
    </div>
	@yield('content')
    @yield('demo2')

	<div id="footer">
		&copy; 2022 Adv. C0DING.
	</div>

</body>
</html>
