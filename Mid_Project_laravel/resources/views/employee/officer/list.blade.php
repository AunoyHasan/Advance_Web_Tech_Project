@extends('employee.layouts.content')
@section('content')
<br>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<br>

<h1 align="center">Officers List</h1>
<center>
<table border="1">
    <tr align="center">
        <th>Name </th>
        <th>Email</th>
        <th>Action</th>

    </tr>
    @foreach($officers as $o)
        <tr align="center">
            <td><a href="{{route('officer.details',['id'=>$o->id+839, 'name'=>$o->name, 'email'=>$o->email, 'address'=>$o->address, 'created_at'=>$o->created_at])}}">{{$o->name}}</a></td>
            <td>{{$o->email}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('officer.mail',['id'=>encrypt($o->id)])}}">Mail</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>

@endsection