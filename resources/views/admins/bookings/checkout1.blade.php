@extends('admins.layouts.index1')
@section('content_header')
	<h1>Check-out All Room Confirm</h1>
@stop
@section('content')
	<section class="invoice">
		<div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
	            <i class="fa fa-credit-card"></i> Oh Yeah
	            <small class="pull-right">Date: {{date('d-m-y')}}</small>
	          </h2>
	        </div>
    	</div>

		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<strong>Full Name: </strong>{{$booking->users->first_name}} {{$booking->users->last_name}}<br>
				<strong>Email: </strong> {{$booking->users->email}}<br>
				<strong>Phone Number: </strong> {{$booking->users->phone_number}} <br>
			</div>

			<div class="col-sm-4 invoice-col">
				<strong>Address: </strong> {{$booking->users->address}} <br>
			</div>

			<div class="col-sm-4 invoice-col">
				<strong>Booking ID: </strong> {{$booking->code}} <br>
				<strong>Room Name: </strong> | @foreach($bookroom as $br) {{$br->rooms->name}} |@endforeach <br>
			</div>

			<div class="row">
		        <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			        	<tr>
							<th>Service Name</th>
							<th>Quantity</th>
							<th>Price</th>
							</tr>
							@foreach($bookroom as $br)
								@foreach($br->services as $service)
								<tr>
								<td>{{$service->name}}</td>
								<td>{{$service->pivot->quantity}}</td>
								<td>{!!number_format($service->price * $service->pivot->quantity)!!}đ</td>
								</tr>
								@endforeach
	      					@endforeach
			        </table>
		        </div>
	      	</div>

	      	<div class="row">
	      		<div class="col-xs-6">
	      			 <div class="table-responsive">
			            <table class="table">
			              <tr>
			                <th style="width:50%">Room Price:</th>
			                <td>{{number_format($roomTotal)}}đ@if($booking->status==1) <i class="fa fa-check-square"></i>@endif</td>
			              </tr>
			              <tr>
			                <th>Services Total Price:</th>
			                <td>{{number_format($serviceTotal)}}đ</td>
			              </tr>
			              <tr>
			                <th>Total:</th>
			                @if($booking->status == 0)
			                <td>{{number_format($serviceTotal)}}đ</td>
			                @else
			                <td>{{number_format($serviceTotal + $roomTotal)}}đ</td>
			              	@endif
			              </tr>
			            </table>
	      		</div>
	      	</div>
		</div>
	</section>
@stop
