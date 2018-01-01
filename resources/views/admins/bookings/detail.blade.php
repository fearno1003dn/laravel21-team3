@extends('admins.layouts.index1')
@section('content_header')
    <h1>Booking {!!$booking->name!!} ID {!! $booking->code !!}</h1>
@stop
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Booking Details</strong></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <ul style="padding-top: 15px;">

                        <li>
                            <strong>User Name </strong>: {!! $booking->users->first_name !!}
                        </li>

                        <li>
                            <strong>Booking ID </strong> : {!! $booking->code !!}
                        </li>

                        <li>
                            <strong>Check In </strong> : {!! $booking->check_in !!}
                        </li>

                        <li>
                            <strong>Expected Check Out </strong> : {!! $booking->check_out !!}
                        </li>

                        <li>
                            <strong>Time Now </strong> : {!! $now !!}
                        </li>

                        <li>
                            <strong>Expected Days</strong> : {!! $diff1 !!}
                        </li>

                        <li>
                            <strong>Reality Days</strong> : {!! $diff2 !!}
                        </li>

                        <li>
                            <strong>Promotion Code </strong> : {!! $booking->promotions->code !!}  <strong>Discount</strong> : {!! $booking->promotions->discount !!}%
                        </li>

                        <li>
                            <strong>Status </strong> :
                            {!!$booking->status ? '<span>Available</span>' : '<span>Not Available</span>'!!}
                        </li>

                        <li>
                            <strong>Room Name </strong> : @foreach ($booking->rooms as $room) {!! $room->name; !!} , @endforeach
                        </li>

                        <li>
                            <strong>Total </strong> : {!! number_format($booking->total) !!}đ
                        </li>

                        <li style="list-style: none;">
                            <a href="{{url('admins/bookings/edit/'.$booking->id)}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/bookings/delete/'.$booking->id)}}"><i class="fa fa-trash"></i>Delete</a>
                        </li>
                    </ul>
                </div>
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
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    </div>
@stop

@section('script')
<script>
function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
  $datetime1 = date_create($date_1);
  $datetime2 = date_create($date_2);

  $interval = date_diff($datetime1, $datetime2);

  return $interval->format($differenceFormat);

}
</script>
@stop
