@extends('employee.layouts.content')
@section('content')
<br>

<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Back</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<br><br>    
<center>   
    <h3>Edit Product</h3> 
    <form action="{{route('product.edit')}}" method="post">
    <div class="col-md-4">
        {{csrf_field()}}

       
        <input type="hidden" name="id" class="form-control" value="{{$product->id}}"><br>

        <input type="text" name="pname" class="form-control" value="{{$product->pname}}"><br>
        @error('pname')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
       
        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}"><br>
        @error('quantity')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="price" class="form-control" value="{{$product->price}}"><br>
        @error('price')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="category" class="form-control" value="{{$product->category}}"><br>
        @error('cetegory')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Update">

</div>    

    </form>
</center>    

@endsection