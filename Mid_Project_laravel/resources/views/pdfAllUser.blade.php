

<center>


  <div class="tablebody">
 <h4 class="text-success">All Users Records</h4>

<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Created_at</th>


    </tr>

    @foreach($allUser as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}

            <td>{{$s->id}}</td>
            <td>{{$s->username}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->created_at}}</td>
          {{--  <td> <img src="{{asset($s->pro_pic)}}" width="150px" height="100px"></td>  --}}


        </tr>
    @endforeach
</table>
  </div>
</center>
