@extends('admins.layouts.index1')
@section('content_header')
    <h1>Check In {!!$bookroom->rooms->name!!}</h1>
@stop

@section('content')
    {!!Form::open(['url'=>'admins/bookings/detail/checkin/save/'.$bookroom->id])!!}
        <div class="form-group">
            {!! Form::label( "full_name", 'Full Name') !!}

            <div class="form-controls">
                {!!Form::text("full_name",null,['class'=>'form-control'])!!}
            </div>

            {!! Form::label( "passport", 'Passport / ID') !!}

            <div class="form-controls">
                {!!Form::text("passport",null,['class'=>'form-control'])!!}
            </div>

            {!! Form::label( "phone_number", 'Phone Number') !!}

            <div class="form-controls">
                {!!Form::text("phone_number",null,['class'=>'form-control'])!!}
            </div>
        </div>
        {!! Form::submit('Check In Room',['class'=>'btn btn-primary pull-left']) !!}
        <a href="{{url('admins/bookings/detail/'.$bookroom->booking_id)}}" class="btn btn-primary pull-right">Cancel</a>
    {!!Form::close()!!}
@stop
