@extends('employee.layouts.logreg')
<br>
<a href="{{route('product.list')}}" class="btn btn-primary">Back</a>
<a href="{{route('officer.home')}}" class="btn btn-primary">Home</a>
<h4 align="right"> <a href="{{route('officer.logout')}}" class="btn btn-primary">Logout</a> </h4>
<br>    
<center>   
    <h3>Add New Product</h3> 
    <form action="{{route('product.addproduct')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-4">
        {{csrf_field()}}
       
        <input type="text" name="pname" class="form-control" placeholder="Product Name"><br>
        @error('pname')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
       
        <input type="text" name="quantity" class="form-control" placeholder="Quantity"><br>
        @error('quantity')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="price" class="form-control" placeholder="Price"><br>
        @error('price')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <input type="text" name="category" class="form-control" placeholder="Category"><br>
        @error('cetegory')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        Plase give Product Picture
        <input type="file" name="picture">
        @error('picture')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <br><br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Add">

</div>    

    </form>
</center>    