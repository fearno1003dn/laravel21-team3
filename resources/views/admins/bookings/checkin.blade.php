@extends('admins.layouts.index1')
@section('content_header')
    <h1>Check In {!!$bookroom->rooms->name!!}</h1>
@stop

@section('content')
    {!!Form::open(['url'=>'admins/bookings/detail/checkin/save/'.$bookroom->id])!!}
        <div class="form-group">
            <div>
            {!! Form::label( "full_name", 'Full Name') !!}

            <div class="form-controls">
                {!!Form::text("full_name",null,['class'=>'form-control'])!!}
            </div>
            @if ($errors->has('full_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </span>
            @endif
            </div>
            <div>
            {!! Form::label( "passport", 'Passport / ID') !!}

            <div class="form-controls">
                {!!Form::text("passport",null,['class'=>'form-control'])!!}
            </div>
            @if ($errors->has('passport'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('passport') }}</strong>
                                </span>
            @endif
            </div>
            {!! Form::label( "phone_number", 'Phone Number') !!}
            <div>
            <div class="form-controls">
                {!!Form::text("phone_number",null,['class'=>'form-control'])!!}
            </div>
            @if ($errors->has('phone_number'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
            @endif
            </div>
        </div>
        {!! Form::submit('Check In Room',['class'=>'btn btn-primary pull-left']) !!}
        <a href="{{url('admins/bookings/detail/'.$bookroom->booking_id)}}" class="btn btn-primary pull-right">Cancel</a>
    {!!Form::close()!!}
@stop
