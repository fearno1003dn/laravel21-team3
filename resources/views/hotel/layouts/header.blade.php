<!-- start header -->
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="header_top clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="left_header_top">
                        <ul>
                            <li><a href="#"><img src="{{asset('hotel-booking/img/temp-icon.png')}}" alt="temp-icon">London
                                    dc, GR 17°C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 floatright">
                    <div class="right_header_top clearfix floatright">
                        <ul class="nav navbar-nav">
                            @if(Auth::guest())
                                <li class="">
                                    <a class="border-right-dark-4" href="{{url('/login')}}">login</a>
                                </li>
                                <li role="presentation" class="dropdown">
                                    <a id="drop1" href="{{url('/register')}}">Register</a>
                                </li>
                            @else
                                <li>
                                    <a class="border-right-dark-4"
                                       href="{!!asset('/admins')!!}">{{Auth::user()->first_name}} {{ Auth::user()->last_name}}</a>
                                </li>
                                <li>
                                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                <!--<a class="border-right-dark-4" href="{!!url('/review')!!}">PAYMENT</a>
                                        <form id="logout-form" action="{{   route('logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                        </form>-->
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header_area">
    <!-- start main header -->
    <div class="main_header_area">
        <div class="container">
            <!-- start mainmenu & logo -->
            <div class="mainmenu">
                <div id="nav">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="site_logo fix">
                                <a id="brand" class="clearfix navbar-brand border-right-whitesmoke"
                                   href="/"><img src="{{asset('hotel-booking/img/site-logo.png')}}" alt="Trips"></a>
                            </div>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/index')}}">Home</a></li>
                                <li><a href="#">Accomodation</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li role="presentation" class="dropdown">
                                    <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown"
                                       aria-haspopup="true" role="button" aria-expanded="false">
                                        Features
                                    </a>
                                    <ul id="menu2" class="dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About
                                                US</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Booking</a>
                                        </li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="room-details.html">Room Details</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Our
                                                Staff</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">404
                                                Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                            <div class="emergency_number">
                                <a href="tel:+841289480359"><img src="{{asset('hotel-booking/img/call-icon.png')}}"
                                                                 alt="">+841289480359</a>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
            <!-- end mainmenu and logo -->
        </div>
    </div>
@yield('content')
<!-- end main header -->
</header>
