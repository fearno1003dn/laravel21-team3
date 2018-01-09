@extends('admins.dashboard.index')
@section('content_header')
    <h1>Dash Board</h1>
@stop
@section('content')


<div class="box-body">
  <div class="chart">
    <canvas id="bookingChart" style="height:250px"></canvas>
    <canvas id="areaChart" style="height:250px"></canvas>
  </div>
</div>


@stop

@section('script')


<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../../bower_components/Chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function () {


  var areaChartCanvas = $('#bookingChart').get(0).getContext('2d')
  // This will get the first returned node in the jQuery collection.
  var areaChart       = new Chart(areaChartCanvas)
  var areaChartData = {
   labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
   datasets: [
     {
       label               : 'Digital Goods',
       fillColor           : 'rgba(60,141,188,0.9)',
       strokeColor         : 'rgba(60,141,188,0.8)',
       pointColor          : '#3b8bba',
       pointStrokeColor    : 'rgba(60,141,188,1)',
       pointHighlightFill  : '#fff',
       pointHighlightStroke: 'rgba(60,141,188,1)',
       data                : [
         <?php
           if(count($bookings)>0){
             for($i=1;$i<count($bookings);$i=$i+1){
               echo($bookings[$i].',');
             }
           }
         ?>
       ]
     }
    ]
 }

 var areaChartOptions = {
   //Boolean - If we should show the scale at all
   showScale               : true,
   //Boolean - Whether grid lines are shown across the chart
   scaleShowGridLines      : false,
   //String - Colour of the grid lines
   scaleGridLineColor      : 'rgba(0,0,0,.05)',
   //Number - Width of the grid lines
   scaleGridLineWidth      : 1,
   //Boolean - Whether to show horizontal lines (except X axis)
   scaleShowHorizontalLines: true,
   //Boolean - Whether to show vertical lines (except Y axis)
   scaleShowVerticalLines  : true,
   //Boolean - Whether the line is curved between points
   bezierCurve             : true,
   //Number - Tension of the bezier curve between points
   bezierCurveTension      : 0.3,
   //Boolean - Whether to show a dot for each point
   pointDot                : false,
   //Number - Radius of each point dot in pixels
   pointDotRadius          : 4,
   //Number - Pixel width of point dot stroke
   pointDotStrokeWidth     : 1,
   //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
   pointHitDetectionRadius : 20,
   //Boolean - Whether to show a stroke for datasets
   datasetStroke           : true,
   //Number - Pixel width of dataset stroke
   datasetStrokeWidth      : 2,
   //Boolean - Whether to fill the dataset with a color
   datasetFill             : true,
   //String - A legend template
   legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
   //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
   maintainAspectRatio     : true,
   //Boolean - whether to make the chart responsive to window resizing
   responsive              : true
 }

 //Create the line chart
 areaChart.Line(areaChartData, areaChartOptions)
})
</script>


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)


  })



  // aaaaaaaaaaa

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../../bower_components/Chart.js/Chart.js"></script>
<script src="{{asset('AdminLTE-2.4.1/bower_components/Chart.js/Chart.js')}}"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
@stop
