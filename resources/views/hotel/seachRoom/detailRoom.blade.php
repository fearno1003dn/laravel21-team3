@extends('hotel.layouts.app')
@section('content')
    @include('hotel.layouts.availabilitySeach')
    <br>
    <div class="room_detail_main margin-bottom-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="deluxe_room_detail">
                        <div class="section_title content-left margin-bottom-5">
                            <h5>{{$room->roomTypes->name}} Room Detail <span class="price floatright">$ {{$room->price}}</span> <br> <span class="day floatright">/ DAY</span></h5>
                        </div>
                        <div class="section_content">
                            <div class="showcase">
                                <div class="section_description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="clearfix" style="">
                                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                                    <!-- <ul id="vertical" class="gallery list-unstyled"> -->
                                                    <li data-thumb="{!!url('/images/rooms/'.$room->image1)!!}">
                                                        <img alt="slider" src="{!!url('/images/rooms/'.$room->image1)!!}" />
                                                    </li>
                                                    <li data-thumb="{!!url('/images/rooms/'.$room->image2)!!}">
                                                        <img alt="slider" src="{!!url('/images/rooms/'.$room->image2)!!}" />
                                                    </li>
                                                    <li data-thumb="{!!url('/images/rooms/'.$room->image3)!!}">
                                                        <img alt="slider" src="{!!url('/images/rooms/'.$room->image3)!!}" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="facilities_name clearfix margin-bottom-40 margin-top-65">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="section_title margin-bottom-35 padding-bottom-25 border-bottom-whitesmoke">
                                                    <h5>Room Fecilities</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 no-padding-left">
                                                <ul class="single_facilities_name clearul">
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-one.png')}}" alt="">
                                                        <p>Breakfast</p>
                                                    </li>
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-four.png')}}" alt="">
                                                        <p>Room service</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <ul class="single_facilities_name clearul">
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-two.png')}}" alt="">
                                                        <p>Air conditioning</p>
                                                    </li>
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-ten.png')}}" alt="">
                                                        <p>GYM fecility</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <ul class="single_facilities_name clearul">
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-eight.png')}}" alt="">
                                                        <p>Free Parking</p>
                                                    </li>
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-five.png')}}" alt="">
                                                        <p>TV LCD</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <ul class="single_facilities_name clearul">
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-three.png')}}" alt="">
                                                        <p>Pet allowed</p>
                                                    </li>
                                                    <li>
                                                        <img src="{{asset('hotel-booking/img/home-facilities-icon-twelve.png')}}" alt="">
                                                        <p>Wi-fi service</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="room_facilities_des padding-top-50 padding-bottom-50 border-bottom-whitesmoke border-top-whitesmoke">
                                                <p>
                                                    Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor. Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.
                                                </p>
                                                <p>
                                                    Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <!-- start hotel booking -->
                    <!-- end hotel booking -->
                    <!-- start client says slider -->
                    <div class="col-lg-12 col-md-12 col-sm-4">
                        <div class="customer_says margin-top-65">
                            <div class="section_title margin-bottom-30">
                                <h5>Customer Review</h5>
                            </div>
                            <div class="section_description">
                                <div id="customer_says_slider" class="carousel slide" data-ride="carousel" data-pause="none">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <div class="single_says">
                                                <div class="customer_comment">
                                                    <p>
                                                        Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan urna vitae molestie interdum.
                                                    </p>
                                                    <p>
                                                        Nam sed placerat libero, non eleifend dolor.
                                                    </p>
                                                </div>
                                                <div class="customer_detail clearfix">
                                                    <div class="customer_pic alignright-20">
                                                        <a href="#"><img src="{{asset('hotel-booking/img/customer-says-one.png')}}" alt=""></a>
                                                    </div>
                                                    <div class="customer_identity floatright">
                                                        <h6>John Doe</h6>
                                                        <p>www.john.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="single_says">
                                                <div class="customer_comment">
                                                    <p>
                                                        Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan urna vitae molestie interdum.
                                                    </p>
                                                    <p>
                                                        Nam sed placerat libero, non eleifend dolor.
                                                    </p>
                                                </div>
                                                <div class="customer_detail clearfix">
                                                    <div class="customer_pic alignright-20">
                                                        <a href="#"><img src="{{asset('hotel-booking/img/customer-says-one.png')}}" alt=""></a>
                                                    </div>
                                                    <div class="customer_identity floatright">
                                                        <h6>John Doe</h6>
                                                        <p>www.john.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="slider_says left" href="#customer_says_slider" role="button" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="slider_says right" href="#customer_says_slider" role="button" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end client says slider -->
                </div>
            </div>
        </div>
    </div>

@stop