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
                            {!!$room->status ? '<span class="label label-success">Available</span>' : '<span class="label label-danger">Not Available</span>'!!}
                        </li>
                        <li>
                            <strong>Room Size </strong>: <span class="label label-warning">{!!$room->roomSizes->size!!}</span></li>
                        <li>
                            <strong>Description </strong>:{!!$room->description!!}
                        </li>

                        <li style="list-style: none;">
                            <a href="{{url('admins/rooms/'.$room->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/rooms'.$room->id.'/delete')}}"><i class="fa fa-trash"></i>Delete</a>
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
