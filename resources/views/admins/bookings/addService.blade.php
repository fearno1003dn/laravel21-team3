@extends('admins.layouts.index1')
@section('content_header')
@stop
@section('content')
{!!Form::open(['url'=>'admins/bookings/detail/'.$bookroom->booking_id.'/'.$bookroom->room_id])!!}
	<div class="form-group">
			{!! Form::label( "service_id", 'Choose service') !!}
			<div class="form-controls">
				{!! Form::select("service_id",$services,null,['class'=>'form-control']) !!}
			</div>

			{!! Form::label("quantity",'Quantity')!!}
			<div class="form-controls">
				{!!Form::text("quantity",null,['class'=>'form-control'])!!}
			</div>
	</div>
	{!! Form::submit('Add Service',['class'=>'btn btn-primary pull-left']) !!}
<a href="{{url('admins/bookings/detail/'.$bookroom->booking_id)}}" class="btn btn-primary pull-right">Cancel</a>
{!!Form::close()!!}
@stop
