@extends('admins.dashboard.index')
@section('content_header')
    <h1>Dash Board</h1>
@stop
@section('content')

<div class="page-content">
<div class="box-body">

  <div class="row">
      <div class="col-md-3">


        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>



          <!-- START WIDGET SLIDER -->
          <div class="widget widget-default widget-carousel" style="margin-top:32px">
              <i class="fa fa-refresh fa-spin pull-left"></i>
              <div class="owl-carousel" id="owl-example">
                  <div>
                      <div class="widget-title">Total Rooms</div>
                      <div class="widget-subtitle">{{\Carbon\Carbon::today()->diffForHumans()}}</div>
                      <div class="widget-int">{{App\Room::count()}}</div>
                  </div>
                  <div>
                      <div class="widget-title">Available Rooms</div>
                      <div class="widget-subtitle">Available To Rent</div>
                      <div class="widget-int">{{App\Room::where('status',0)->count()}}</div>
                  </div>
                  <div>
                      <div class="widget-title">Booked</div>
                      <div class="widget-subtitle">Currently Booked</div>
                      <div class="widget-int">{{App\Room::where('status',1)->count()}}</div>
                  </div>
              </div>
              <div class="widget-controls">
                  {{--<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"--}}
                  {{--data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>--}}
              </div>
          </div>
        </div>

          <!-- END WIDGET SLIDER -->


      <div class="col-md-3">

          <!-- START WIDGET MESSAGES -->

          <div class="small-box bg-light-blue">
            <div class="inner">
              <h3>{{App\Booking::all()->count()}}</h3>

              <p>Total Bookings</p>
            </div>
            <div class="icon">
              <i class="ion ion-coffee"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>


          <div class="widget widget-default widget-item-icon">
              <div class="widget-item-left ">
                  <span class="fa fa-envelope"></span>
              </div>
              <div class="widget-data">
                  <div class="widget-int num-count">{{App\Booking::all()->count()}}</div>
                  <div class="widget-title">Total Bookings</div>
                  <div class="widget-subtitle">In your Booking list</div>
              </div>
              <div class="widget-controls">
                  <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                     data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
              </div>
          </div>
          <!-- END WIDGET MESSAGES -->

      </div>
      <div class="col-md-3">

          <!-- START WIDGET REGISTRED -->
          <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3>{{App\User::where('active',1)->count()}}</h3>

                        <p>User Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
          <div class="widget widget-default widget-item-icon"
               onclick="location.href='{{'#'}}';">
              <div class="widget-item-left">
                  <span class="fa fa-user"></span>
              </div>
              <div class="widget-data">
                  <div class="widget-int num-count">{{App\User::where('active',1)->count()}}</div>
                  <div class="widget-title">Registred users</div>
                  <div class="widget-subtitle">Active User</div>
              </div>
              <div class="widget-controls">
                  <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                     data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
              </div>
          </div>
          <!-- END WIDGET REGISTRED -->

      </div>
      <div class="col-md-3">

          <!-- START WIDGET CLOCK -->
          <div class="widget widget-danger widget-padding-sm">
              <div class="widget-big-int plugin-clock">00:00</div>
              <div class="widget-subtitle plugin-date">Loading...</div>
              <div class="widget-controls">
                  <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                     data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
              </div>
              <div class="widget-buttons widget-c1">
                  <div class="col">
                      <p>Current Time And Date</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="chart">
    <canvas id="bookingChart" style="height:250px"></canvas>
    <canvas id="areaChart" style="height:250px"></canvas>
  </div>
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
