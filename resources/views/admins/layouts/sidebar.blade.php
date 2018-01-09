<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('AdminLTE-2.4.1/dist/img/tung_adm.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {!! Form::open(['class' => 'sidebar-form', 'url' => 'admins/bookings/search', 'method' => 'get']) !!}
        <!-- <form action="{{url('admins/bookings/search')}}" method="get" class="sidebar-form"> -->
            <div class="input-group">
                <input type="text" name="search3" class="form-control" style="color: red;" value="{{ isset($_GET['search3']) ? $_GET['search3'] : '' }}" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        <!-- </form> -->
        {!! Form::close() !!}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="{!!asset('admins/dashboard')!!}">
                    <i class="fa fa-dashboard"></i> <span>DASHBOARD </span>
                </a>
            </li>
            <li>
                <a href="{!!asset('admins/rooms')!!}">
                    <i class="fa fa-home"></i> <span>ROOMS </span>
                </a>
            </li>
            <li>
                <a href="{!!url('admins/roomTypes')!!}">
                    <i class="fa fa-simplybuilt"></i> <span>ROOM TYPES </span>
                </a>
            </li>
            <li>
                <a href="{{url('admins/services')}}">
                    <i class="fa fa-shopping-bag"></i> <span>SERVICES</span>
                </a>
            </li>
            <li>
                <a href="{{url('admins/users')}}">
                    <i class="fa fa-user"></i> <span>USER MANAGEMENT</span>
                </a>
            </li>
            <li>
                <a href="{{url('admins/bookings')}}">
                    <i class="fa fa-book"></i> <span>BOOKING MANAGEMENT</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
