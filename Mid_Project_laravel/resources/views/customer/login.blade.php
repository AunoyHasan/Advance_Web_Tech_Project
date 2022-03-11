@extends('layout.customerLayout')
@section('content')
<form method="post" action="{{route('c.home')}}">
	<fieldset>
    @csrf
		<legend>LOGIN</legend>
		Userame: <input type="text" name="username" placeholder="Userame" value="munna">
        <span style="color:red">@error('username') {{$message}} @enderror</span><br>
        
		Password: <input type="Password" name="password" placeholder="Password(4)" value="munna">
        <span style="color:red">@error('password'){{$message}} @enderror</span>
        <br>
		<input type="submit" name="submit" value="Login">
	</fieldset>
</form>
@endsection
