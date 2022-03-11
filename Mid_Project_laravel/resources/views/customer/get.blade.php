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
    <ol>
        @for($i=0;$i<count($names);$i++)
            <li>{{$names[$i]}}</li>
        @endfor
    </ol>
    <ul>
        @foreach($names as $n)
            <li>{{$loop->iteration}} {{$n}}</li>
        @endforeach
    </ul>
</body>
</html>
@endsection
