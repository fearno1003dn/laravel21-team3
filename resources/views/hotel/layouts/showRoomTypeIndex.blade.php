<div class="row">
    @foreach($roomTypes as $roomType)
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="single_room_wrapper clearfix">
                <figure class="uk-overlay uk-overlay-hover">
                    <div class="room_media">
                        <a href="{{route('room.TypeVip', $roomType->id)}}"><img
                                    src="{{asset('hotel-booking/img/room-image-five.png')}}"
                                    alt=""></a>
                    </div>
                    <div class="room_title border-bottom-whitesmoke clearfix">
                        <div class="left_room_title floatleft">
                            <h6>{{$roomType->name}} Room</h6>
                        </div>
                        <div class="left_room_title floatright">
                            <a href="{{route('room.TypeVip', $roomType->id)}}" class="btn">List Room</a>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    @endforeach
</div>
