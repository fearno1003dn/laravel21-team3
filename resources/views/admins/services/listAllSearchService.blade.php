@extends('admins.layouts.index1')
@section('content_header')
    <h1>All Results</h1>
@stop

@section('content')


      @if(count($services)==0)
      <div class="row">
        <div class="box-header">
            <p>Sorry we found nothing</p>
        </div>
      </div>
      @endif

    @if(count($services)!=0)
    <div class="row">
        <div class="box-header">
          <p>   Here are results that match your search</p>


            @include('partials.forms.search',['url'=>'admins/services/search'])
          </div>
          <div class="col-xs-12">
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

                              <td><a href="{{url('admins/services/'.$service->id.'/edit')}}" ><i class="fa fa-edit" ></i>Edit</a> - <a href="{{url('admins/services/'.$service->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this service?');"><i class="fa fa-trash"></i>Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {!! $services->appends($_GET)->links()!!}
        </div>
        <!-- /.col -->
    </div>
    @endif

@stop
