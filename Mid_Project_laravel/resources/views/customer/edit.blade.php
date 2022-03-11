@extends('layouts.studentLayout')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION</title>
</head>
<body>
	<form method="" action="">
		<fieldset>
			<legend>REGISTRATION</legend>
			Username: <input type="text" name="username" value="{{$student->username}}"><br>
			Email: <input type="text" name="email" value="{{$student->email}}"><br>
			Password: <input type="Password" name="password" value="{{$student->password}}" readonly><br>
			<input type="submit" name="submit">
		</fieldset>
	</form>
</body>
</html>
@endsection
