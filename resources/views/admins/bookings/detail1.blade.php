@extends('admins.layouts.index1')
@section('content_header')
    <h1>Booking {!!$booking->name!!} # {!! $booking->code !!}</h1>
@stop

@section('content')


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title" style="padding-top: 25px;"><strong>Booking Details</strong></h3>
        </div>
        <div class="box-body">

            <div class="container">
                <div class="row">


                    <div class="col-lg-6 col-md-12 col-sm-12">

                        <div class="col-sm-12 btn btn-primary "><h2 class="h2">Info</h2></div>

                        <div class="room-detail_overview">

                            <table class="simple">

                                <ul>
                                    <tr>
                                        <td>
                                            <li>
                                                <strong>User Name </strong>:
                                            </li>
                                        </td>
                                        <td>
                                            <span>{!! $booking->users->first_name !!} {!! $booking->users->last_name !!}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Booking ID </strong> :
                                            </li>
                                        </td>
                                        <td>{!! $booking->code !!}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li><strong>Check In </strong> :</li>
                                        </td>
                                        <td>{!! $booking->check_in !!}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Expected Check Out </strong> :
                                            </li>
                                        </td>
                                        <td> {!! $booking->check_out !!}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Time Now </strong> :
                                            </li>
                                        </td>
                                        <td>{!! $now !!}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li><strong>Room Service:</strong></li>
                                        </td>
                                        <td>Avaible</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Expected Days</strong> :
                                            </li>
                                        </td>
                                        <td> {!! $diff1 !!}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Reality Days</strong> :
                                            </li>
                                        </td>
                                        <td>{!! $diff2 !!}</td>
                                    </tr>
                                    @if ($booking->promotion_id)
                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Promotion Code </strong> :
                                            </li>
                                        </td>
                                        <td>{!! $booking->promotions->code !!}</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <li><strong>Discount</strong>:</li>
                                        </td>
                                        <td>{!! $booking->promotions->discount !!}%</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <li>
                                                <strong>Status </strong> :

                                            </li>
                                        </td>
                                        <td>
                                          <!-- {!!$booking->status ? '<span>Booking</span>' : '<span>Checkin </span>'!!} -->
                                          @if($booking->status == 0 )
                                          <span>Booking</span>
                                          @elseif($booking->status == 1 )
                                          <span>Check-in</span>
                                          @elseif($booking->status == 2 )
                                          <span>Cancel</span>
                                          @elseif($booking->status == 3 )
                                          <span>Check-out</span>
                                          @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($booking->status==0)
                                                <a href="{{url('admins/bookings/checkin/'.$booking->id)}}" class='btn btn-primary pull-right'>Check In Booking</a>
                                            @endif
                                            @if($booking->status==1)
                                            <a href="{{url('admins/bookings/detail/'.$booking->id.'/checkout')}}"
                                               class='btn btn-primary pull-right'>Check Out All Rooms</a>
                                            @endif   
                                        </td>
                                    </tr>

                                </ul>
                            </table>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="col-sm-12 btn btn-primary "><h2 class="h2">List Room </h2></div>
                        <div class="room-detail_overview">
                            <table class="simple">
                                @foreach($bookroom as $br)
                                <ul>
                                    <tr>
                                        <th>
                                            <li>
                                                <strong>Room </strong>:
                                            </li>
                                        </th>
                                        <td>
                                            <strong>{{$br->rooms->name}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <li>
                                                <strong>Full Name </strong>:
                                            </li>
                                        </th>
                                        <td>
                                            {{$br->full_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <li>
                                                <strong>Passport / ID </strong>:
                                            </li>
                                        </th>
                                        <td>
                                            {{$br->passport}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <li>
                                                <strong>Phone Munber </strong>:
                                            </li>
                                        </th>
                                        <td>
                                            {{$br->phone_number}}
                                        </td>
                                    </tr>
                                </ul>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </div>

                <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                    @foreach($bookroom as $br)
                        <div class="col-lg-12 col-md-3 col-sm-6">
                            <div>
                                -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                            </div>
                            <div class="col-lg-12 ">
                                <p class='btn btn-default pull-left'><strong>Room : </strong>{{$br->rooms->name}}</p>
                                @if($booking->status==0)
                                <a href="{{url('admins/bookings/detail/checkin/'.$br->id)}}"
                                   class='btn btn-primary pull-right'>Check In Room</a>
                                @endif
                                @if($booking->status==1)
                                <a href="{{url('admins/bookings/detail/'.$br->booking_id.'/'.$br->room_id.'/addservice')}}"
                                   class='btn btn-default pull-right' ><i class="fa fa-plus"></i>Add Service</a>
                                @endif
                            </div>
                            <div class="room-detail_overview">

                                @if($booking->status==0)
                                    <table class="simple">
                                        <ul>
                                            <tr>
                                                <td>
                                                    <li>
                                                        <strong>Full Name </strong>:
                                                    </li>
                                                </td>
                                                <td>
                                                    <span>{!! $br->full_name !!}</span>
                                                </td>
                                            </tr>
                                        </ul>
                                        <ul>
                                            <tr>
                                                <td>
                                                    <li>
                                                        <strong>Passport / ID </strong>:
                                                    </li>
                                                </td>
                                                <td>
                                                    <span>{!! $br->passport !!}</span>
                                                </td>
                                            </tr>
                                        </ul>
                                        <ul>
                                            <tr>
                                                <td>
                                                    <li>
                                                        <strong>Phone Number </strong>:
                                                    </li>
                                                </td>
                                                <td>
                                                    <span>{!! $br->phone_number !!}</span>
                                                </td>
                                            </tr>
                                        </ul>
                                    </table>
                                @else
                                <div class="box-body table-sm">
                                    <table class="table table-sm table-hover">
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            @if($booking->status==1)
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                        @foreach($br->services as $service)
                                            <tr>
                                                <td>{{$service->name}}</td>
                                                <td>{{$service->price}}</td>
                                                <td>{{$service->pivot->quantity}}</td>
                                                <td>{{$service->price * $service->pivot->quantity}}</td>
                                                @if($booking->status==1)
                                                <td>
                                                    <a href="{{url('admins/bookings/detail/'.$br->booking_id.'/'.$br->room_id.'/'.$service->pivot->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this service?');"><i
                                                                class="fa fa-trash"></i> Delete</a></td>
                                                @endif
                                            </tr>

                                        @endforeach

                                    </table>
                                </div>
                                @endif
                                @if($booking->status==1)
                                <a href="{{url('admins/bookings/detail/'.$br->booking_id.'/'.$br->room_id.'/checkout')}}"
                                   class='btn btn-primary pull-right'>Check Out</a>
                                @endif   
                            </div>

                            {{--<div>--}}
                                {{------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}


                            {{--</div>--}}
                        </div>
                    @endforeach
                    </div>

            </div>
        </div>
    </div>

@stop
