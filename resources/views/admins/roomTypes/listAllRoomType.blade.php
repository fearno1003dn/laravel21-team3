@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All Room Type</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                <a href="{{ url('admins/roomTypes/create') }}" class="btn btn-primary fa fa-heart-o"> Create Room
                    Type</a>
                @include('partials.forms.search',['url'=>'admins/roomTypes/search'])
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
            </div>
            <!-- /.col -->
        </div>
    @stop
    <!-- @section('script')
        <script>
          $(function () {
            $('#example2').DataTable({

              // "dom":' <"search"fl><"top">rt<"bottom"ip><"clear">'
            // "dom": '<"top"l><"top-right"f>t<"bottom"pi><"clear">',
            // "dom": '<"wrapper"flipt>'
            // "dom": 't',
            // "dom": ' <"top pull-right"f>t<"bottom"li><"bottom pull-right"p><"clear">',
            // "dom":  '<"pull-left top"l>&<"pull-right top"f>t<"pull-left bottom"i>&<"pull-right bottom"p><"clear">',
            "dom":  '<"pull-left top"l>&<"pull-right top"f>t<"pull-left bottom"ip><"clear">',
            language: {
            searchPlaceholder: "Search me plz ahihi"
        }
            })

          })



        </script>


        @stop -->
