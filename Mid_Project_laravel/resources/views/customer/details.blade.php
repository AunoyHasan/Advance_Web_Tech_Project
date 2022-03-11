@php
	//$name=htmlspecialchars('<h1>munna</h1>');
    
@endphp
@extends('layouts.studentLayout')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    NAME: {{$name}}<br>
    ID: {{$id}}
</body>
</html>
@endsection
