@extends('hotel.layouts.app')
@section('slider')
    @include('hotel.layouts.availabilitySeach')
    <br>
@endsection
@section('content')
    <!-- start other detect room section -->
    <section class="other_room_area">
        <div class="container">
            <div class="row">
                <div class="other_room">
                    <div class="section_title nice_title content-center">
                        <h3>The rooms you need to find</h3>
                    </div>
                    <div class="section_content">
                        <!-- start single room details -->
                        <div class="accomodation_single_room">
                            <div class="container">
                                <div class="row">
                                    @foreach($rooms as $room)
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="single_room_wrapper clearfix padding-bottom-30">
                                            <figure class="uk-overlay uk-overlay-hover">
                                                <div class="room_media">
                                                    <a href="{{route('room.detailRoom', $room->id )}}"><img src="{{asset('hotel-booking/img/room-image-five.png')}}" alt=""></a>
                                                </div>
                                                <div class="room_title border-bottom-whitesmoke clearfix">
                                                    <div class="left_room_title floatleft">
                                                        <h6>{{$room->roomTypes->name}} Room</h6>
                                                        <p>${{$room->price}}/ <span>DAY</span></p>
                                                    </div>
                                                    <div class="left_room_title floatright">
                                                        <a href="#" class="btn">Book</a>
                                                    </div>
                                                </div>
                                                <div class="uk-overlay-panel uk-overlay-background single_wrapper_details clearfix animated bounceInDown">
                                                    <div class="border-dark-1 padding-22 clearfix single_wrapper_details_pad">
                                                        <h5>{{$room->roomTypes->name}} Room</h5>
                                                        <p>
                                                            Semper ac dolor vitae accumsan. interdum hendrerit lacinia.
                                                        </p>
                                                        <p>
                                                            Phasellus accumsan urna vitae molestie interdum.
                                                        </p>
                                                        <div class="single_room_cost clearfix">
                                                            <div class="floatleft">
                                                                <p>${{$room->price}}/ <span>DAY</span></p>
                                                            </div>
                                                            <div class="floatright">
                                                                <a href="#" class="btn">Book</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <nav class="text-center margin-top-65 margin-bottom-75">
                                        <ul class="pagination">
                                            <li>
                                                <a href="#" aria-label="Previous">
                                                    <i class="fa fa-angle-left"></i>prev
                                                </a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li>
                                                <a href="#" aria-label="Next">next
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- end single room details -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@stop