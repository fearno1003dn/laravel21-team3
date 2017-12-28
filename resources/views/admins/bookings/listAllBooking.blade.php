@extends('admins.layouts.index1')
@section('content_header')
@stop

@section('content')

    <div class="row">

        <div class="col-xs-12">
            <div class="box-header">
                <a href="{{url('admins/bookings')}}" class="btn btn-primary fa fa-heart-o"> List All Booking</a>
                <!-- <form class="form-inline" style="float: right;" action="{{asset('admins/bookings/search')}}" method="get" role="searchBooking"> -->
                {!! Form::open(['class' => 'form-inline', 'name' => 'search', 'style' => 'float: right;', 'url' => 'admins/bookings/search', 'method' => 'get']) !!}    
                    {{ csrf_field() }}

                    <label class="">Check In :</label>
                    <input type="date" name="search1" class="form-control" value="{{ isset($_GET['search1']) ? $_GET['search1'] : '' }}">

                    <label class="">Check Out :</label>
                    <input type="date" name="search2" class="form-control" value="{{ isset($_GET['search2']) ? $_GET['search2'] : '' }}">

                    <input type="text" name="search" class="form-control" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" placeholder="Search...">

                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                {!! Form::close() !!}    
                <!-- </form> -->
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table  class="table table-bordered table-striped" style="text-align:center; ">
                            <thead>
                                <tr>
                                    <th style="text-align:center; ">User Name</th>
                                    <th style="text-align:center; ">Check In</th>
                                    <th style="text-align:center; ">Check Out</th>
                                    <th style="text-align:center; ">Promotion Code</th>
                                    <th style="text-align:center; ">Status</th>
                                    <th style="text-align:center; ">Code</th>
                                    <th style="text-align:center; ">Total</th>
                                    <th style="text-align:center; ">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{!! $booking->users->first_name !!}</td>
                                    <td>{!! $booking->check_in !!}</td>
                                    <td>{!! $booking->check_out !!}</td>
                                    <td>{!! $booking->promotions->code !!}</td>
                                    <td>
                                        {!!$booking->status ? '<a>Available</a>' : '<a>Not Available</a>'!!}
                                    </td>
                                    <td>{!! $booking->code !!}</td>
                                    <td>{!! number_format($booking->total) !!}đ</td>
                                    <td><a href="{{url('admins/bookings/edit/'.$booking->id)}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/bookings/delete/'.$booking->id)}}"><i class="fa fa-trash"></i>Delete</a> - <a href="{{url('admins/bookings/detail/'.$booking->id)}}"><i class="fa fa-book"></i>Detail</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- /.box -->
            {!! $bookings->links() !!}
        </div>
        <!-- /.col -->
    </div>

@stop
