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

                        <li>
                          <strong>Image 1</strong>:  <img src="{!!url('/images/rooms/'.$room->image1)!!}" alt="" style='width: 550px; height: 300px; border:5px solid gray;'>
                        </li>

                        @if($room->image2)
                        <li>
                          <strong>Image 2</strong>:  <img src="{!!url('/images/rooms/'.$room->image2)!!}">
                        </li>
                        @endif
                        @if(!$room->image2)
                        <li>
                          <strong>This room not have for more than one image <a href="{{url('admins/rooms/'.$room->id.'/edit')}}" >Add Now</a> </strong>
                        </li>
                        @endif

                        @if($room->image3)
                        <li>
                          <strong>Image 3</strong>:  <img src="{!!url('/images/rooms/'.$room->image3)!!}">
                        </li>
                        @endif
                        @if($room->image2 && !$room->image3)
                        <li>
                          <strong>This room not have for more than two image <a href="{{url('admins/rooms/'.$room->id.'/edit')}}" >Add Now</a> </strong>
                        </li>
                        @endif


                        <li style="list-style: none;">
                            <a href="{{url('admins/rooms/'.$room->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/rooms'.$room->id.'/delete')}}"><i class="fa fa-trash"></i>Delete</a>
                        </li>
                    </ul>
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
    @foreach($calendars as $cld)
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

    }
    @endforeach
  ]
})
</script>
@stop
