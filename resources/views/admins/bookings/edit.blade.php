@extends('admins.layouts.index1')
@section('content_header')
    <h1>Edit "{{$booking->users->first_name}}" Booking</h1>
@stop
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
					<div class="panel-body">
						{!! Form::model($booking,['class' => 'form-horizontal', 'url'=>'admins/bookings/update/'.$booking->id,'files' => true, 'enctype' => 'multipart/form-data', 'method'=>'put']) !!}
						    @include('partials.forms.bookings')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
