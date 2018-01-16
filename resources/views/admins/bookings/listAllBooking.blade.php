@extends('admins.layouts.index1')
@section('content_header')
@stop

@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="table2excel.js" type="text/javascript"></script>
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

                    <label class="">Status :</label>
                    <select name="search4" class="form-control">
                        <option value=""></option>
                        <option value="0" {{(isset($_GET['search4']) && $_GET['search4'] == '0') ? 'selected' : '' }}>Booking</option>
                        <option value="1" {{(isset($_GET['search4']) && $_GET['search4'] == 1) ? 'selected' : '' }}>Check In</option>
                        <option value="2" {{(isset($_GET['search4']) && $_GET['search4'] == 2) ? 'selected' : '' }}>Cancel</option>
                        <option value="3" {{(isset($_GET['search4']) && $_GET['search4'] == 3) ? 'selected' : '' }}>Check Out</option>
                    </select>

                     <input type="text" name="search" class="form-control" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" placeholder="Search...">

                     <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                {!! Form::close() !!}
            </div>
                <div class="box">
                    <!-- /.box-header -->
                    <div id="dvData1" class="box-body">
                        <table class="table table-bordered table-striped" style="text-align:center; ">
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
                                    <td>${!! number_format($booking->total) !!}</td>
                                    <td>@if($booking->status == 0 && $booking->check_in >= $date)
                                        <a href="{{url('admins/bookings/cancel/'.$booking->id)}}"><i class="fa fa-trash"></i>Cancel</a> - <a href="{{url('admins/bookings/detail/'.$booking->id)}}"><i class="fa fa-book"></i>Detail</a>
                                         - <a href="{{url('admins/bookings/detail/'.$booking->id)}}"><i class="fa fa-book"></i>Check In</a>
                                        @else
                                        <a href="{{url('admins/bookings/detail/'.$booking->id)}}"><i class="fa fa-book"></i>Detail</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align:center; ">Total Money :</th>
                                        <th style="text-align:center; ">${!! number_format($totalmoney) !!}</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th><input type="button" id="btnExport" class="btn btn-primary fa fa-heart-o" value="Export to Excel"></th>
                                        </th>
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
<div id="dvData" style="display: none;">
    <table>
        <tr>
            <th>User Name</th>
            <th>Date created</th>
            <th>Promotion Code</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Status</th>
            <th>Code</th>
            <th>Total</th>
        </tr>
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
                <td>${!! number_format($booking->total) !!}</td>
            </tr>
        @endforeach
            <tr></tr>
        @if (isset($totalmoney))
            <tr>
                <td></td>
                <td></td>
                <th>Total Booking :</th>
                <th>{!! $totalbooking !!}</th>
                <td></td>
                <td></td>
                <th>Total Money :</th>
                <th>${!! number_format($totalmoney) !!}</th>
            </tr>
        @endif
    </table>
</div>
    <script type="text/javascript">
    $("#btnExport").click(function (e) {
        window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
        e.preventDefault();
    });
    </script>

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
