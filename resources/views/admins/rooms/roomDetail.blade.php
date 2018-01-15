@extends('admins.layouts.index1')
@section('content_header')
    <h1>Room {!!$room->name!!}</h1>
@stop
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Room Details</strong></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <ul style="padding-top: 15px;">

                        <li>
                            <strong>Room Type </strong>: {!!$room->roomTypes->name!!}
                        </li>

                        <li>
                            <strong>Price </strong> : {!!number_format($room->price)!!}đ
                        </li>
                        <li>
                            <strong> Status </strong> :
                            {!!$room->status ? '<span>Available</span>' : '<span>Not Available</span>'!!}
                        </li>
                        <li>
                            <strong>Room Size </strong>: <span>{!!$room->roomSizes->size!!}</span></li>
                        <li>
                            <strong>Description </strong>:{!!$room->description!!}
                        </li>




                    </ul>
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{!!url('/images/rooms/'.$room->image1)!!}" alt="" style='width: 550px; height: 300px; border:5px solid gray;'>
    </div>

    <div class="item">
      <img src="{!!url('/images/rooms/'.$room->image2)!!}" alt="" style='width: 550px; height: 300px; border:5px solid gray;'>
    </div>

    <div class="item">
      <img src="{!!url('/images/rooms/'.$room->image3)!!}" alt="" style='width: 550px; height: 300px; border:5px solid gray;'>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            </div>
        </div>

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Booking Calendar</strong></h3>
        </div>
        <div class="col--12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar1"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    </div>
  </div>
</div>

@stop


@section('script')
<script src="{{asset('AdminLTE-2.4.1/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>

<script>
var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

$('#calendar1').fullCalendar({
  header    : {
    left  : 'prev,next',
    center: 'title',
    right : ''
  },

  events    : [
    @foreach($calendars as $key => $cld)

    {
      title          : 'Booking # {{$cld->bookings->code}}',
      start          : '{{$cld->bookings->check_in}}',
      end            : "{{$cld->bookings->check_out}}",
      allDay         : true,
      backgroundColor: '#3c8dbc',

      url			 : "{{url('admins/bookings/detail/'.$cld->booking_id)}}"
    },
    {
      title          : 'User : {{$cld->bookings->users->first_name}} {{$cld->bookings->users->last_name}}',
      start          : '{{$cld->bookings->check_in}}',
      end            : "{{$cld->bookings->check_out}}",
      allDay         : true,
      backgroundColor: '#b5bc3c',

    },
    @endforeach
  ]
})
</script>
@stop
