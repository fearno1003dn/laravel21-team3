@extends('admins.layouts.index1')
@section('content_header')
    <h1>All Results</h1>
@stop
@section('content')
    @if(count($roomTypes)==0)
        <div class="row">
            <div class="box-header">
                <p>Sorry we found nothing</p>
            </div>
        </div>
    @endif
    @if(count($roomTypes)!=0)
        <div class="row">
            <div class="box-header">
                <p> Here are results that match your search</p>
                @include('partials.forms.search',['url'=>'admins/roomTypes/search'])
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
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
                                    <td><a href="{{url('admins/roomTypes/'.$roomType->id.'/edit')}}"><i
                                                    class="fa fa-edit"></i>Edit</a>
                                        - <a href="{{url('admins/roomTypes/'.$roomType->id.'/delete')}}"
                                             onclick="return confirm('Are you sure you want to delete this room type?');">
                                            <i class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                {!! $roomTypes->appends($_GET)->links()!!}
            </div>
            <!-- /.col -->
        </div>
    @endif
@stop
