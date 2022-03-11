@extends('employee.layouts.content')
@section('content')
<br><br>
<h1 align="center">Officers listList</h1>
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
                <a class="btn btn-primary" href="{{route('officer.edit',['id'=>encrypt($o->id)])}}">Edit</a>
                <a class="btn btn-primary" href="{{route('officer.delete',['id'=>encrypt($o->id)])}}">Delete</a>
                <a class="btn btn-primary" href="{{route('officer.mail',['id'=>encrypt($o->id)])}}">Mail</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>

@endsection