@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All Services</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-xs-12">
            <a href="{{ url('admins/services/create') }}" class="btn btn-primary fa fa-heart-o"> Create Service</a>
            <div class="box">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table  class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($services as $service)
                                <tr>

                                    <td>{!!$service->name!!}</td>
                                    <td>{!!number_format($service->price)!!}đ</td>
                                    <td>{!!$service->description!!}</td>

                                    <td><a href="{{url('admins/services/'.$service->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/services/'.$service->id.'/delete')}}"><i class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    {!! $services->links()!!}
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

@stop
