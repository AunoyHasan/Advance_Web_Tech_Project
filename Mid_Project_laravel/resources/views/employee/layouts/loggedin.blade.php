@include('employee.includes.header')
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php echo $chartData?>
                    ]);

                var options = {
                    title: 'Product Visualization',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
        </script>
		
    </head>
        <style>
		    #nav-manu{
			    width:1600px;
				height:80px;
				background-color:#639e63;
				margin: 0 auto;
			}
		    #nav-manu ul{ }
		    #nav-manu ul li{
			    list-style-type:none;
			    margin:20px;
				float:left;
			}
            #nav-manu ol h2{
			    list-style-type:none;
			    margin:20px;
				float:left;
			}
		    #nav-manu ul li a{
			    text-decoration:none;
				font-size:30px;
				color:white;
			}
			
			#nav-manu ul li a:hover{
			    text-decoration:underline;
			}
			
		</style>
    
    <body>    
        <div id="nav-manu">
           <ul>
                <li><a href="#">Home</li>
                <li><a href="{{route('officer.profile',['id'=>$of->id+839, 'name'=>$of->name, 'email'=>$of->email, 'address'=>$of->address, 'created_at'=>$of->created_at])}}">Profile</a></li>
                <li><a href="{{route('officer.list')}}">Officer</li>
                <li><a href="{{route('product.list')}}">Product</li>
                <li><a href="{{route('viewAllAdmin')}}">Admin</li>
                <li><a href="{{route('customerList')}}">Customer</li>
                <li><a href="{{route('supplier.list')}}">Supplier</li>
                <li><a href="{{route('officer.setting')}}">Setting</li>
                <li><a href="{{route('officer.logout')}}">Logout</a></li>
            </ul>

            <ol><h2> Welcome {{Session::get('logged')}}</h2></ol>

        </div>
    </body>
	
	
 
	<body>
        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </body>


</html>

<br><br>
@include('employee.includes.footer')