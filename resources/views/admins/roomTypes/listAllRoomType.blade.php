@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All Room Type</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-xs-12">
          <div class="box-header">
            <a href="{{ url('admins/roomTypes/create') }}" class="btn btn-primary fa fa-heart-o"> Create Room Type</a>



            <form class="box-tools">
        			{{ csrf_field() }}
              <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="search" class="form-control pull-right" placeholder="Search...">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
        		</form>

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Room Type</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($roomTypes as $roomType)
                            <tr>

                                <td>{!!$roomType->name!!}</td>
                                <td>{!!$roomType->description!!}</td>
                                <td><a href="{{url('admins/roomTypes/'.$roomType->id.'/edit')}}" >
                                  <i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/roomTypes/'.$roomType->id.'/delete')}}">
                                    <i class="fa fa-trash"></i>Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@stop
