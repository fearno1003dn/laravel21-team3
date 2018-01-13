@extends('hotel.users.index')
@section('content')
    <div class="row" style="padding-right: 50px;padding-left: 50px;">

        <div class="col-xs-12">
            <div class="box-header">
                <a href="{{url('/user/bookings')}}" class="btn btn-primary fa fa-heart-o"> List All Booking</a>
                <!-- <form class="form-inline" style="float: right;" action="{{asset('admins/bookings/search')}}" method="get" role="searchBooking"> -->
                {!! Form::open(['class' => 'form-inline', 'name' => 'search', 'style' => 'float: right;', 'url' => 'user/bookings/search', 'method' => 'get']) !!}    
                    {{ csrf_field() }}

                    <label class="">From :</label>
                    <input type="date" name="search1" class="form-control" value="{{ isset($_GET['search1']) ? $_GET['search1'] : '' }}">

                    <label class="">To :</label>
                    <input type="date" name="search2" class="form-control" value="{{ isset($_GET['search2']) ? $_GET['search2'] : '' }}">

                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                {!! Form::close() !!}    
                <!-- </form> -->
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table  class="table table-bordered table-striped" style="text-align:center; ">
                            <thead>
                                <tr>
                                    <th style="text-align:center; ">Date created</th>
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
                                    <td>{!! date_format($booking->created_at,"Y-m-d") !!}
                                    </td>
                                    <td>{!! $booking->check_in !!}</td>
                                    <td>{!! $booking->check_out !!}</td>
                                    <td>
                                        @if(isset($booking->promotion_id))
                                            {!! $booking->promotions->code !!}
                                        @endif
                                    </td>
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
                                    <td>@if($booking->status == 0 && $booking->check_in > $date) <a href="{{url('/user/edit')}}" >Cancel Booking</a>
                                        @else <a href="#" ></i>Not Active</a>
                                    @endif</td>        
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
</div>
@endsection