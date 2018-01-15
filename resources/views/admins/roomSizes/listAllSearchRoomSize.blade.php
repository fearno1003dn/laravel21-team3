@extends('admins.layouts.index1')
@section('content_header')
    <h1>All Results</h1>
@stop

@section('content')

      @if(count($roomSizes)==0)
      <div class="row">
        <div class="box-header">
            <p>Sorry we found nothing</p>
        </div>
      </div>
      @endif

    @if(count($roomSizes)!=0)
    <div class="row">
        <div class="box-header">
          <p>   Here are results that match your search</p>
            @include('partials.forms.search',['url'=>'admins/roomSizes/search'])
          </div>
          <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Room Size Name</th>
                              <th>Room Size</th>
                              <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($roomSizes as $roomSize)
                            <tr>
                              <td>{!!$roomSize->name!!}</td>
                              <td>{!!$roomSize->size!!}</td>
                              <td><a href="{{url('admins/roomSizes/'.$roomSize->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a>
                                - <a href="{{url('admins/roomSizes/'.$roomSize->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this room type?');">
                                  <i class="fa fa-trash"></i>Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {!! $roomSizes->appends($_GET)->links()!!}
        </div>
        <!-- /.col -->
    </div>
    @endif
@stop
