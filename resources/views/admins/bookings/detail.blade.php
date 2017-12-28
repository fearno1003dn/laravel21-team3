@extends('admins.layouts.index1')
@section('content_header')
    <h1>Booking {!!$booking->name!!}</h1>
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
                            <strong>Check In </strong> : {!! $booking->check_in !!}
                        </li>

                        <li>
                            <strong>Check Out </strong> : {!! $booking->check_out !!}
                        </li>

                        <li>
                            <strong>Promotion Code </strong> : {!! $booking->promotions->code !!}
                        </li>

                        <li>
                            <strong>Status </strong> :
                            {!!$booking->status ? '<span class="label label-success">Available</span>' : '<span class="label label-danger">Not Available</span>'!!}
                        </li>
                        
                        <li>
                            <strong>Code </strong> : {!! $booking->code !!}
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
