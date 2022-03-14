@extends('layout.customerLayout')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>
	<form method="" action="">
    <h1>Edit</h1>
		<fieldset>
			<legend>Edit</legend>
			Username: <input type="text" name="username" value="{{session()->get('username')}}"><br>
			Email: <input type="text" name="email" value="{{session()->get('email')}}"><br>
			<input type="submit" name="submit" value="Update">
		</fieldset>
	</form>
</body>
</html>
@endsection
