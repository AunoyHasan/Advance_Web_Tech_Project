@extends('employee.layouts.content')
@section('content')
<h1>Officers listList</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Id</th>
        <th>Email</th>
        <th>Address</th>
        <th>Registration Date</th>

    </tr>
    @foreach($officers as $o)
        <tr>
            <td><a href="{{route('officer.details',['id'=>$o->id+839,'name'=>$o->name])}}">{{$o->name}}</a></td>
            <td>{{$o->name}}</td>
            <td>{{$o->id}}</td>
            <td>{{$o->email}}</td>
            <td>{{$o->address}}</td>
            <td>{{$o->created_at}}</td>
            <td><a class="btn btn-primary" href="{{route('officer.edit',['id'=>encrypt($o->id)])}}">Edit</a></td>
        </tr>
    @endforeach
</table>
@endsection