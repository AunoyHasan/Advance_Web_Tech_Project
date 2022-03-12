

<center>


  <div class="tablebody">
 <h4 class="text-success">All Admins List</h4>

<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Gender</th>
        {{--<th>Image</th>--}}

    </tr>

    @foreach($allAd as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}

            <td>{{$s->id}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->gender}}</td>
          {{--  <td> <img src="{{asset($s->pro_pic)}}" width="150px" height="100px"></td>  --}}


        </tr>
    @endforeach
</table>
  </div>
</center>
