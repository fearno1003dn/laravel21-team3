<div class="main_slider_area">
    <div class="main_slider" id="slider_rev">
        <!-- start hotel booking -->
        <div class="hotel_booking_area">
            <div class="container">
                <div class="hotel_booking">
                    <form id="form1" role="form" action="#" class="">
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="room_book border-right-dark-1">
                                <h6>Book Your</h6>
                                <p>Rooms</p>
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-2 col-sm-2">
                            <div class="input-group border-bottom-dark-2">
                                <input class="date-picker" id="datepicker" placeholder="Arrival" type="text"/>
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-2 col-sm-2">
                            <div class="input-group border-bottom-dark-2">
                                <input class="date-picker" id="datepicker1" placeholder="Departure" type="text"/>
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 icon_arrow">
                                    <div class="input-group border-bottom-dark-2">
                                        <select class="form-control" name="room" id="room">
                                            <option value="2">Room 2 People</option>
                                            <option value="4">Room 4 People</option>
                                            <option value="6">Room 6 People</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 icon_arrow">
                                    <div class="input-group border-bottom-dark-2">
                                        <select class="form-control" name="room" id="adult">
                                            <option value="Vip">Vip</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Famyly">Famyly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <a class="btn btn-primary floatright">Book</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- special offer start -->
                    <div class="special_offer_main">
                        <img src="{{asset('hotel-booking/img/special-offer-main.png')}}" alt="">
                    </div>
                    <!-- end offer start -->
                </div>
            </div>
        </div>
        <!-- end hotel booking -->
    </div>
</div>
