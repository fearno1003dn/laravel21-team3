@extends('hotel.layouts.app')
@section('slider')
    @include('hotel.layouts.slider')
    <br>
    <h3>The rooms you need to find :</h3>
    <br>
@endsection
@section('content')
    <div class="row">
        @foreach($rooms as $room)
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_room_wrapper clearfix">
                    <figure class="uk-overlay uk-overlay-hover">
                        <div class="room_media">
                            <a href="#"><img src="{{asset('hotel-booking/img/room-image-five.png')}}"
                                             alt=""></a>
                        </div>
                        <div class="room_title border-bottom-whitesmoke clearfix">
                            <div class="left_room_title floatleft">
                                <h6>{{$room->roomTypes->name}} Room</h6>
                                <p>{{$room->price}}/ <span>Day</span></p>
                            </div>
                            <div class="left_room_title floatright">
                                <a href="#" class="btn">Book</a>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
        @endforeach <br>
    </div>
@stop