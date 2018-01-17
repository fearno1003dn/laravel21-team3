@extends('admins.layouts.index1')
@section('content_header')
	<h1>Check-out All Room Confirm</h1>
@stop
@section('content')

		<div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
	            <i class="fa fa-credit-card"></i> Check out
	            <small class="pull-right">Date: {{date('d-m-y')}}</small>
	          </h2>
	        </div>
    	</div>

		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<strong>Full Name: </strong>{{$booking->users->first_name}} {{$booking->users->last_name}}<br>
				<strong>Email: </strong> {{$booking->users->email}}<br>

			</div>

			<div class="col-sm-4 invoice-col">
				<strong>Address: </strong> {{$booking->users->address}} <br>
				<strong>Phone Number: </strong>(+84) {{$booking->users->phone_number}} <br>
			</div>

			<div class="col-sm-4 invoice-col">
				<strong>Booking ID: </strong> {{$booking->code}} <br>
				<strong>Room Name: </strong> | @foreach($bookroom as $br) {{$br->rooms->name}} |@endforeach <br>
			</div>

			<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-striped">
							<tr>
							<th>Room</th>
							<th>Room Type Price</th>
							<th>Day Using</th>
							<th>Room Using Price</th>


							</tr>

							@foreach($bookroom as $br)

							<tr>
							<td>{{$br->rooms->name}}</td>
							<td>{!!number_format($br->rooms->price)!!}</td>
							<td>{{$diff1}} Days</td>
							<td>${!!number_format($br->rooms->price * $diff1)!!} </td>


							</tr>

							@endforeach

							</table>
						</div>
					</div>



					@if($booking->promotion_id)
	      	<div class="row">
	      		<div class="col-xs-6">
	      			 <div class="table-responsive">
			            <table class="table">
										<tr>
			                <th>Promotion Code:</th>

			                <td>{{ $booking->promotions->code }}</td>

			              </tr>

										<tr>
			                <th>Discount:</th>

			                <td>{{ $booking->promotions->discount }}%</td>

			              </tr>
			              <tr>
			                <th>Services Total Price:</th>
			                <td>{{number_format($serviceTotal)}} $</td>
			              </tr>
			              <tr>
			                <th>Total:</th>

			                <td>${{number_format($totalPrice)}} </td>

			              </tr>
			            </table>
	      		</div>
	      	</div>
				</div>
				@endif


		@if(!$booking->promotion_id)
			<div class="row">
				<div class="col-xs-6">
					 <div class="table-responsive">
							<table class="table">
								<tr>
									<th>Services Total Price:</th>
									<td>${{number_format($serviceTotal)}}</td>
								</tr>
								<tr>
									<th>Total:</th>

									<td>${{number_format($totalPrice)}}</td>

								</tr>
							</table>
				</div>
			</div>
</div>
@endif

<a href="{{url('admins/bookings/detail/'.$br->booking_id.'/checkout/confirm')}}"
	 class='btn btn-primary pull-left'>Confirm and Print</a>

@stop
