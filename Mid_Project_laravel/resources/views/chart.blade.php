<div style="background-image: linear-gradient(lightcyan, purple,lightcyan);padding-bottom:80px;">

<h4 align="center";>LET'S VIEW YOUR EXPERIENCE!</h4>
<table align="center" >
  <tr>
    <td>

      <html>
      <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],

          ['Males({{$totalMales}})',     '{{$totalMales}}'],
          ['Females({{$totalFemales}})',   '{{$totalFemales}}'],


        ]);


            var options = {
              title: 'Number: Male Admins vs Female Admins',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
          }
        </script>
      </head>
      <body>
        <div id="piechart_3d" style="width: 500px; height: 400px;"></div>
      </body>

  </td>
    <td>
      <html>
        <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);





            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
            {{--    ['2004',  1000,      400],
                ['2005',  1170,      460],
                ['2006',  660,       1120],
                ['2007',  1030,      540] --}}

                <?php echo $data; ?>


              ]);

              var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: { position: 'bottom' }
              };

              var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

              chart.draw(data, options);
            }
          </script>
        </head>
        <body>
          <div id="curve_chart" style="width: 500px; height: 400px"></div>
        </body>
      </html>
    </td>
  </tr>
</table>
</div>
