@extends('employee.layouts.content')
@section('content')
<center>

<div class="dashAllbody">


<h4 class="text-success"> WELLCOME IN EMPLOYEE DASHBOARD</h4>
<p>
    <table  border="1">

        <tr> 
            <td id="dashboard">
               <h5> <a href="">VIEW ALL-CATEGORIES</a> </h5>
                <ul>
                   <li>Number of total categories-></li>
                   <li>Edit categories info</li>
                   <li>Remove categories</li>
                </ul>
            </td>
        </tr>

        <tr>
            <td id="dashboard"><h5><a href="">Add new product</a> </h5></td>
            <td id="dashboard"><h5><a href="">View all-products</a></h5></td>
            <td id="dashboard"><h5><a href="">View all-Employee</a></h5></td>
        </tr>


  </table>
</p>
</div>
</center>
@endsection