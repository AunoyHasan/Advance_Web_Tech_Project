@extends('employee.layouts.content')
@section('content')
<br><br>

<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>

<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>

<center>
    
<form action="{{route('product.search')}}" method="GET">
<a href="{{route('product.addproduct')}}" class="btn btn-primary"> Add Product</a>
    <input type="text" name="search" placeholder="Search for product..">
    <input type="submit" value="Search">
    <button type="button" name="back"  ><a href="{{route('product.list')}}"> Reset </a> </button>
</form>
</center>

<h1 align="center">Product List</h1>
<br>
<center>
<table border="1">
    <tr align="center">
        <th>Supplier Name </th>
        <th>Email</th>
        <th>Address</th>
        <th>Salary</th>
    </tr>
    
    <tr>
        <td>{{name2}}</a></td>
        <td>{{name2}}</a></td>
        <td>{{name2}}</a></td>
        <td>{{name2}}</a></td>
    </tr>
  
</table>
</center>
<br><br>

@endsection