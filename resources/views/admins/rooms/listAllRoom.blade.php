@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All Room</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-xs-12">
          <div class="box-header">
            <a href="{{ url('admins/rooms/create') }}" class="btn btn-primary fa fa-heart-o"> Create Room</a>

<!-- <<<<<<< HEAD


            <form class="box-tools" action="{{asset('admins/rooms/search')}}" method="GET" role="search">
        			{{ csrf_field() }}
              <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="search" class="form-control pull-right" placeholder="Search...">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
        		</form>

======= -->
              @include('partials.forms.search',['url'=>'admins/rooms/search'])


            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Room Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Room size</th>
                                <th>Room Type</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($rooms as $room)
                            <tr>

                                <td>{!!$room->name!!}</td>
                                <td>{!!number_format($room->price)!!}đ</td>
                                <td>
                                    {!!$room->status ? '<a>Available</a>' : '<a>Not Available</a>'!!}
                                </td>
                                <td>{!!$room->roomSizes->size!!}</td>
                                <td>{!!$room->roomTypes->name!!}</td>
                                <td>
                                  <img src="{!!url('/images/rooms/'.$room->image1)!!}" alt="" style='width: 50px; height: 30px;'>
                                </td>
                                <td><a href="{{url('admins/rooms/'.$room->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/rooms/'.$room->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this room type?');"><i class="fa fa-trash" id="deleteGroup"></i>Delete</a>
                                - <a href="{{url('admins/rooms/'.$room->id)}}"><i class="fa fa-book"></i>Detail</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {!! $rooms->appends($_GET)->links()!!}
        </div>
        <!-- /.col -->
    </div>

@stop

@section('script')
jQuery(document).ready(function($){
     $('.deleteGroup').on('submit',function(e){
        if(!confirm('Do you really want to delete this item?')){
              e.preventDefault();
        }
      });
});
@stop
