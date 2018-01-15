@extends('admins.layouts.index1')

@section('content')
<div class="container table-responsive">
	<span>About {!!count($rooms)!!} results</span>
	<table class="table table-striped table-hover ">
		<thead class="table-inverse">
			<tr>
				<th>Room Name</th>
				<th>Price</th>
				<th>Status</th>
				<th>Amount People</th>
				<th>Room Type</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach ($rooms as $room)
			<tbody>
				<tr>
					<td><a >{!!$room->name!!}</a></td>
					<td>{!!number_format($room->price)!!}VND</td>
					<td>
						{!!$room->status ? '<span class="label label-success">Available</span>' : '<span class="label label-danger">Not Available</span>'!!}
					</td>

					<td>{!!$room->roomSizes->size!!}</td>
					<td>{!!$room->roomTypes->name!!}</td>
					<td>
						<a href="{{url('admins/rooms/'.$room->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a>
						- <a href="{{url('admins/rooms/'.$room->id.'/delete')}}"><i class="fa fa-trash"></i>Delete</a>
						- <a href="{{url('admins/rooms/'.$room->id)}}"><i class="fa fa-book"></i>Detail</a>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
</div>
@stop
