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
@extends('hotel.layouts.header')
<!-- end header -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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