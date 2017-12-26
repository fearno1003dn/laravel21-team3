<div class="main_slider_area">
    <div class="main_slider" id="slider_rev">
        <!-- start hotel booking -->
        <div class="hotel_booking_area">
            <div class="container">
                <div class="hotel_booking">
                    <form id="form1" role="form" action="{{route('room.seach')}}" class="" method="get">
                        {{ csrf_field() }}
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="room_book border-right-dark-1">
                                <h6>Book Your</h6>
                                <p>Rooms</p>
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-2 col-sm-2">
                            <div class="input-group border-bottom-dark-2">
                                <input class="date-picker" required="date" name="arrival" id="datepicker"
                                       placeholder="Arrival"
                                       type="text"/>
                                    @if ( $errors->has('arrival') )
                                    <span class="text-warning">
                                        <strong> {{ $errors->first('arrival') }}</strong>
                                    </span>
                                    @endif
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-2 col-sm-2">
                            <div class="input-group border-bottom-dark-2">
                                <input class="date-picker" required="date" name="departure" id="datepicker1"
                                       placeholder="Departure"
                                       type="text"/>
                                    @if ( $errors->has('departure') )
                                        <span class="text-warning">
                                            <p> {{ $errors->first('departure') }}</p>
                                        </span>
                                    @endif
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-4 icon_arrow">
                                    <div class="input-group border-bottom-dark-2">
                                        <select class="form-control" name="size" id="size">
                                            @include('hotel.layouts.roomSizeIndex')
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 icon_arrow">
                                    <div class="input-group border-bottom-dark-2">
                                        <select class="form-control" name="roomType" id="roomType">
                                            @include('hotel.layouts.roomTypeIndex')                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <button class="btn btn-primary floatright">Find Room</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- special offer start -->
                    <!-- end offer start -->
                </div>
            </div>
        </div>
        <!-- end hotel booking -->
    </div>
</div>
