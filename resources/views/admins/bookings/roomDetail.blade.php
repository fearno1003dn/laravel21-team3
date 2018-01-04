@extends('admins.layouts.index1')
@section('content_header')
	<h1>Room Detail</h1>
@stop
@section('content')
		<div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">

	          </h2>
	        </div>
    	</div>

		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<strong>Room Name: </strong>  {{$bookroom->rooms->name}} <br>
				<strong>Room Price: </strong> {{$bookroom->rooms->price}}h<br>

			</div>

			<div class="col-sm-4 invoice-col">
				<strong>Room Type: </strong> {{$bookroom->rooms->roomTypes->name}}<br>
				<strong>Room Size: </strong>{{$bookroom->rooms->roomSizes->name}}<br>
			</div>
			<div class="col-sm-4 invoice-col">
				<strong>Booking ID: </strong>{{$booking->code}}<br>
			</div>
			<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-striped">
							<tr>
							<th>Service</th>
							<th>Services Price</th>
							<th>Quantity</th>
							<th>Service Total Price</th>
							</tr>


							@foreach($bookroom->services as $service)
				      <tr>
				      <td>{{$service->name}}</td>
				      <td>{!!number_format($service->price)!!}</td>
							<td>{{$service->pivot->quantity}}</td>
							<td>{!!number_format($service->price * $service->pivot->quantity)!!}</td>
							</tr>
				      @endforeach
							</table>
						</div>
					</div>
</div>
@stop
