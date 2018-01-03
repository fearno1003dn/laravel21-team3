@extends('hotel.layouts.app')
@section('content')
    @include('hotel.layouts.availabilitySeach')
    <br>
    <div class="row">
        <div class="other_room">
            <div class="section_title nice_title content-center">
                <h3>Check Out Room Booking</h3>
            </div>
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-8 col-md-8">
                <div class="table-responsive">
                    <a href="{{url('/seachroom/seach?&arrival='.$arrival.'&departure='.$departure.'&size='.$size.'&roomType='.$roomType)}}">
                        <button class="btn btn-primary floatright" type="button" name="button">Continue Order</button>
                    </a>
                    <table class="table table-bordered">
                        <tr class="room_table">
                            <td class=""><span class="imp_table_text">ROOM TYPE</span></td>
                            <td class=""><span class="imp_table_text">AMOUNT PEOPLE</span></td>
                            <td class=""><span class="imp_table_text">DAYS</span></td>
                            <td class=""><span class="imp_table_text">PRICE</span></td>
                            <td class=""><span class="imp_table_text">UNIT PRICE</span></td>
                            <td class=""><span class="imp_table_text"></span>ACTION</td>
                        </tr>
                        @foreach(Cart::content() as $row)
                            <tr class="tax_table">
                                <td>{{$row->name}}</td>
                                <td>{!!$row->options->roomSize!!}</td>
                                <td>{{$row->qty}}</td>
                                <td>{{$row->price}} $</td>
                                <td>{{$row->total}} $</td>
                                <td><a href="{{route('bookings.delete', $row->rowId )}}">
                                        <button class="btn btn-danger">Delete Room</button>
                                    </a></td>
                            </tr>
                        @endforeach
                        <table class="table table-bordered">
                            <tr class="room_table">
                                <td class="col-lg-10 col-md-sm-10">Total</td>
                                <td class="col-lg-2 col-md-sm-2">{{Cart::total()}} $</td>
                            </tr>
                        </table>
                        <a href="{{url('/seachroom/seach?&arrival='.$arrival.'&departure='.$departure.'&size='.$size.'&roomType='.$roomType)}}">
                            <button class="btn btn-primary floatright" type="button" name="button">BOOKING</button>
                        </a>
                    </table>
                </div>
            </div>
            <div class="col-lg-2 col-md-2"></div>
        </div>
@stop
