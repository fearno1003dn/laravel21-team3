@extends('hotel.layouts.app')
@section('content')
    @include('hotel.layouts.availabilitySeach')
    <br>
    <!-- start other detect room section -->
    <section class="other_room_area">
        <div class="container">
            <div class="row">
                <div class="other_room">
                    <div class="section_title nice_title content-center">
                        <h3>The rooms you need to find</h3>
                        <div class="left_room_title floatright">
                            <a href="{{route('bookings.checkout')}}">
                                <button class="btn btn-info "
                                        type="button" name="button">
                                    BACK TO CHECKOUT
                                </button>
                        </div>
                    </div>
                    <div class="section_content">
                        <!-- start single room details -->
                        <div class="accomodation_single_room">
                            <div class="container">
                                <div class="row">
                                    @foreach($rooms as $room)
                                        @if (count(Cart::content()) == 0)
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <div class="single_room_wrapper clearfix padding-bottom-30">
                                                    <figure class="uk-overlay uk-overlay-hover">
                                                        <div class="room_media">
                                                            <a href="{{route('room.detailRoom', $room->id )}}"><img style="width:263px;height: 187px;"
                                                                        src="{!!url('/images/rooms/'.$room->image1)!!}"
                                                                        alt=""></a>
                                                        </div>
                                                        <div class="room_title border-bottom-whitesmoke clearfix">
                                                            <div class="left_room_title floatleft">
                                                                <h6>{{$room->roomTypes->name}} Room</h6>
                                                                <p>${{$room->price}}/ <span>DAY</span></p>
                                                            </div>
                                                            <div class="left_room_title floatright">
                                                                <a href="{{route('bookings.add', $room->id)}}">
                                                                    <button class="btn btn-primary floatright"
                                                                            type="button" name="button">
                                                                        BOOK
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                        @else
                                            <?php $d = 0;?>
                                            @foreach (Cart::content() as $row)
                                                @if ($row->id == $room->id)
                                                    <?php $d++; ?>
                                                @endif
                                            @endforeach
                                            @if ($d == 0)
                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                    <div class="single_room_wrapper clearfix padding-bottom-30">
                                                        <figure class="uk-overlay uk-overlay-hover">
                                                            <div class="room_media">
                                                                <a href="{{route('room.detailRoom', $room->id )}}"><img style="width:  263px;height: 187px;"
                                                                            src="{!!url('/images/rooms/'.$room->image1)!!}"
                                                                            alt=""></a>
                                                            </div>
                                                            <div class="room_title border-bottom-whitesmoke clearfix">
                                                                <div class="left_room_title floatleft">
                                                                    <h6>{{$room->roomTypes->name}} Room</h6>
                                                                    <p>${{$room->price}}/ <span>DAY</span></p>
                                                                </div>
                                                                <div class="left_room_title floatright">
                                                                    <a href="{{route('bookings.add', $room->id)}}">
                                                                        <button class="btn btn-primary floatright"
                                                                                type="button" name="button">
                                                                            BOOK
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($d != 0)
                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                    <div class="single_room_wrapper clearfix padding-bottom-30">
                                                        <figure class="uk-overlay uk-overlay-hover">
                                                            <div class="room_media">
                                                                <a href="{{route('room.detailRoom', $room->id )}}"><img style="width:  263px;height: 187px;"
                                                                            src="{!!url('/images/rooms/'.$room->image1)!!}"
                                                                            alt=""></a>
                                                            </div>
                                                            <div class="room_title border-bottom-whitesmoke clearfix">
                                                                <div class="left_room_title floatleft">
                                                                    <h6>{{$room->roomTypes->name}} Room</h6>
                                                                    <p>${{$room->price}}/ <span>DAY</span></p>
                                                                </div>
                                                                <div class="left_room_title floatright">
                                                                    <a href="{{route('bookings.add', $room->id)}}">
                                                                        <button class="btn btn-primary floatright"
                                                                                type="button" name="button" disabled>
                                                                            BOOK
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                {!! $rooms->appends($_GET)->links()!!}
                            </div>
                        </div>
                        <!-- end single room details -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop