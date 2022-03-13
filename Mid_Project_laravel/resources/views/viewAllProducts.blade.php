    @extends('layout')
    @section('content')

    <center>


      <div class="tablebody2">
    <form action="{{route('searchProduct')}}" method="GET">
          <input type="text" name="search"  placeholder="Search for product..">
          <input type="submit" value="Search">
    </form>
     <h4 class="text-success">All Products List</h4>
     <h4>
     <a href="{{ route('generatePDF_allProduct') }}">
         <img src="css/Downloadpdf.png" height="100px" >
     </a>
     <button type="button" name="back" class="btn btn-success" ><a href="adminDashboard"> <h6>Back to Dashboard</h6> </a>  </button>
    </h4>
    <h4 class="text-success" >  {{session()->get('msg2')}} </h4>
    <h4 class="text-success" >  {{session()->get('msg3')}} </h4>
    <table border="1" align="center">


        <tr>
            <th>Id</th>
            <th>Product_Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Cetegory</th>
            <th>action</th>
        </tr>
        @foreach($products as $s)
            <tr>
                {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
                <td>{{$s->id}}</td>
                <td>{{$s->pname}}</td>
                <td>{{$s->quantity}}</td>
                <td>{{$s->price}}</td>
                <td>{{$s->category}}</td>


                <td>

                          <button class="btn btn-danger"><a href="{{route('productDelete', ['id' => $s->id])  }}">Delete</button>

                </td>
            </tr>
        @endforeach
    </table>
      </div>
    </center>
    @endsection
