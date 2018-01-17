@extends('admins.layouts.index1')
@section('content_header')
    <h1>Service {!!$service->service_name!!}</h1>
@stop
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>service Details</strong></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <ul style="padding-top: 15px;">
                        <li>
                            <strong>Service Name </strong>: {!!$service->service_name!!}
                        </li>
                        <li style="list-style: none;">
                            <a href="{{url('admins/services'.$service->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/services'.$service->id.'/delete')}}"><i class="fa fa-trash"></i>Delete</a>
                        </li>
                        <li>
                            <strong>Price </strong> : ${!!number_format($service->service_price)!!}
                        </li>
                        <li>
                            <strong>Description </strong>:{!!$service->description!!}
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
