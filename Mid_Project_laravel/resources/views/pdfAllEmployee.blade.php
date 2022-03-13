<center>


  <div class="tablebody2">
 <h4 class="text-success">All Employees List</h4>
 <h4>

</h4>
<table border="1" align="center">


    <tr>
        <th>Id</th>
        <th>Officer_Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>Address</th>

    </tr>
    @foreach($employees as $s)
        <tr>
            {{-- <td><a href="{{route('details', ['id' => $s->id,'name'=>$s->name])}}">{{$s->name}}</td> --}}
            <td>{{$s->id}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->salary}}</td>
            <td>{{$s->address}}</td>

        </tr>
    @endforeach
</table>
  </div>
</center>
