<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('hotel-booking/img/favicon.ico')}}" sizes="16x16">

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Karla:700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/font-awesome.css')}}"/>

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/bootstrap.min.css')}}"/>

    <!-- uikit -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/uikit.min.css')}}"/>

    <!-- animate -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('hotel-booking/css/datepicker.css')}}"/>
    <!-- Owl carousel 2 css -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/owl.carousel.css')}}">
    <!-- rev slider -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/rev-slider/settings.css')}}"/>
    <!-- lightslider -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/lightslider.css')}}">
    <!-- Theme -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/reset.css')}}">

    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('hotel-booking/style.css')}}"/>
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('hotel-booking/css/responsive.css')}}"/>

    <!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
    <!-- This Template Is Fully Coded By Aftab Zaman from swiftconcept.com -->
    <!--[if lt IE
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body id="home_one">

<!-- start preloader -->
<div id="loader-wrapper">
    <div class="logo"><a href="#"><span>Hotel</span>-Booking</a></div>
    <div id="loader">
    </div>
</div>

<!-- start header -->
<!-- start header -->
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="header_top clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="left_header_top">
                        <ul>
                            <li><a href="#"><img src="{{asset('hotel-booking/img/temp-icon.png')}}" alt="temp-icon">London dc, GR 17°C</a></li>
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
                                    <a id="drop1" href="{{url('/register')}}" >Register</a>
                                </li>
                            @else
                                <li>    
                                    <a class="border-right-dark-4" href="{{url('/user/index')}}">{{Auth::user()->first_name}} {{ Auth::user()->last_name}}</a>
                                </li>    
                                <li>
                                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                                <li><a href="{{url('/user/index')}}">Detail</a></li>
                                <li><a href="{{url('/user/bookings')}}">Booking</a></li>
                                <li role="presentation" class="dropdown">
                                    <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown"
                                       aria-haspopup="true" role="button" aria-expanded="false">
                                        Features
                                    </a>
                                    <ul id="menu2" class="dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="about-us.html">About
                                                US</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="booking.html">Booking</a>
                                        </li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="room-details.html">Room Details</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="staff.html">Our
                                                Staff</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="404.html">404
                                                Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">News</a></li>
                                <li><a href="contact-us.html">Contacts</a></li>
                            </ul>
                            <div class="emergency_number">
                                <a href="tel:1234567890"><img src="{{asset('hotel-booking/img/call-icon.png')}}" alt="">123
                                    456 7890</a>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
            <!-- end mainmenu and logo -->
        </div>
    </div>
    <!-- end main header -->
</header>
@yield('content')


<!-- jquery library -->
<script src="{{asset('hotel-booking/js/vendor/jquery-1.11.2.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('hotel-booking/js/bootstrap.min.js')}}"></script>
<!-- rev slider -->
<script src="{{asset('hotel-booking/js/rev-slider/rs-plugin/jquery.themepunch.plugins.min.js')}}"></script>
<script src="{{asset('hotel-booking/js/rev-slider/rs-plugin/jquery.themepunch.revolution.js')}}"></script>
<script src="{{asset('hotel-booking/js/rev-slider/rs.home.js')}}"></script>
<!-- uikit -->
<script src="{{asset('hotel-booking/js/uikit.min.js')}}"></script>
<!-- easing -->
<script src="{{asset('hotel-booking/js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{asset('hotel-booking/js/datepicker.js')}}"></script>
<!-- scroll up -->
<script src="{{asset('hotel-booking/js/jquery.scrollUp.min.js')}}"></script>
<!-- owlcarousel -->
<script src="{{asset('hotel-booking/js/owl.carousel.min.js')}}"></script>
<!-- lightslider -->
<script src="{{asset('hotel-booking/js/lightslider.js')}}"></script>

<!-- wow Animation -->
<script src="{{asset('hotel-booking/js/wow.min.js')}}"></script>
<!--Activating WOW Animation only for modern browser-->
<!--[if !IE]><!-->
<script type="text/javascript">new WOW().init();</script>
<!--<![endif]-->

<!--Oh Yes, IE 9+ Supports animation, lets activate for IE 9+-->
<!--[if gte IE 9]>
<script type="text/javascript">new WOW().init();</script>
<![endif]-->

<!--Opacity & Other IE fix for older browser-->
<!--[if lte IE 8]>
<script type="text/javascript" src="{{asset('hotel-booking/js/ie-opacity-polyfill.js')}}"></script>
<![endif]-->


<!-- my js -->
<script src="{{asset('hotel-booking/js/main.js')}}"></script>

</body>
</html>