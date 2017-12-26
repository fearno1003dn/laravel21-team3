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
                            <p>$200/ <span>DAY</span></p>
                        </div>
                        <div class="left_room_title floatright">
                            <a href="{{route('room.TypeVip', $roomType->name)}}" class="btn">List Room</a>
                        </div>
                    </div>
                    <div class="uk-overlay-panel uk-overlay-background single_wrapper_details clearfix animated bounceInDown">
                        <div class="border-dark-1 padding-22 clearfix single_wrapper_details_pad">
                            <h5>Vip Room</h5>
                            <p>
                                Semper ac dolor vitae accumsan. interdum hendrerit lacinia.
                            </p>
                            <p>
                                Phasellus accumsan urna vitae molestie interdum.
                            </p>
                            <div class="single_room_cost clearfix">
                                <div class="floatleft">
                                    <p>$200/ <span>DAY</span></p>
                                </div>
                                <div class="floatright">
                                    <a href="{{route('room.TypeVip', $roomType->name)}}" class="btn">List Room</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    @endforeach
</div>
