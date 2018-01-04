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
 
                     <label class="">From :</label>
                     <input type="date" name="search1" class="form-control" value="{{ isset($_GET['search1']) ? $_GET['search1'] : '' }}">
 
                     <label class="">To :</label>
                     <input type="date" name="search2" class="form-control" value="{{ isset($_GET['search2']) ? $_GET['search2'] : '' }}">
 
                     <input type="text" name="search" class="form-control" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" placeholder="Search...">
 
                     <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                {!! Form::close() !!}
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped" style="text-align:center; ">
                            <thead>
                                <tr>
                                    <th style="text-align:center; ">User Name</th>
                                    <th style="text-align:center; ">Date created</th>
                                    <th style="text-align:center; ">Promotion Code</th>
                                    <th style="text-align:center; ">Check In</th>
                                    <th style="text-align:center; ">Check Out</th>
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
                                    <td>
                                        {!! date_format($booking->created_at,"Y-m-d") !!}
                                    </td>
                                    <td>
                                        @if(isset($booking->promotion_id))
                                            {!! $booking->promotions->code !!}
                                        @endif
                                    </td>
                                    <td>{!! $booking->check_in !!}</td>
                                    <td>{!! $booking->check_out !!}</td>
                                    <td>
                                        <?php
                                        switch($booking->status){
                                            case '0': echo '<a></i>Booking</a>';
                                                break;
                                            case '1': echo '<a></i>Check In</a>';
                                                break;  
                                            case '2': echo '<a></i>Cancel</a>';
                                                break;
                                            case '3': echo '<a></i>Check Out</a>';
                                                break;  
                                            }
                                        ?>
                                    </td>
                                    <td>{!! $booking->code !!}</td>
                                    <td>{!! number_format($booking->total) !!} $</td>
                                    <td>@if($booking->status == 0 && $booking->check_in > $date)
                                        <a href="{{url('admins/bookings/cancel/'.$booking->id)}}"><i class="fa fa-trash"></i>Cancel</a> - <a href="{{url('admins/bookings/detail/'.$booking->id)}}"><i class="fa fa-book"></i>Detail</a>
                                        @else 
                                        <a href="{{url('admins/bookings/detail/'.$booking->id)}}"><i class="fa fa-book"></i>Detail</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $bookings->appends($_GET)->links() !!}
                    <!-- /.box-body -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped" style="text-align:center; ">
                            <thead>
                                @if (isset($totalmoney))
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align:center; ">Total Booking :</th>
                                        <th style="text-align:center; ">{!! $totalbooking !!}</th>
                                        <th style="text-align:center; ">Total Money :</th>
                                        <th style="text-align:center; ">{!! number_format($totalmoney) !!} $</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                @endif
                            </thead>
                        </table>
                    </div>
                </div>
            <!-- /.box -->
            
        </div>
        <!-- /.col -->
    </div>

@stop

<!-- @section('script')
<script>
  $(function () {
    $('#example2').DataTable({

      // "dom":' <"search"fl><"top">rt<"bottom"ip><"clear">'
    // "dom": '<"top"l><"top-right"f>t<"bottom"pi><"clear">',
    // "dom": '<"wrapper"flipt>'
    // "dom": 't',
    // "dom": ' <"top pull-right"f>t<"bottom"li><"bottom pull-right"p><"clear">',
    // "dom":  '<"pull-left top"l>&<"pull-right top"f>t<"pull-left bottom"i>&<"pull-right bottom"p><"clear">',
    "dom":  '<"pull-left top"l>&<"pull-right top"f>t<"pull-left bottom"ip><"clear">',
    language: {
    searchPlaceholder: "Search me plz ahihi"
}
    })

  })



</script>


@stop -->
