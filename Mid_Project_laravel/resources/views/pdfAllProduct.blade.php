<center>


  <div class="tablebody2">
 <h4 class="text-success">All Products List</h4>
 <h4>

</h4>

<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Product_Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Cetegory</th>

    </tr>
    @foreach($allProduct as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
            <td>{{$s->id}}</td>
            <td>{{$s->pname}}</td>
            <td>{{$s->quantity}}</td>
            <td>{{$s->price}}</td>
            <td>{{$s->category}}</td>

        </tr>
    @endforeach
</table>
  </div>
</center>
