@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All Room</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-xs-12">
          <div class="box-header">
            <a href="{{ url('admins/rooms/create') }}" class="btn btn-primary fa fa-heart-o"> Create Room</a>
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped" >
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
                                <td><a href="{{url('admins/rooms/'.$room->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a>
                                - <a href="{{url('admins/rooms/'.$room->id.'/delete')}}" class="fa fa-trash" onclick="return confirm('Are you sure you want to delete this room?');" data-confirm="Are you sure to delete this room?">Delete</a>
                                - <a href="{{url('admins/rooms/'.$room->id)}}"><i class="fa fa-book"></i>Detail</a></td>
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

@section('script')
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


@stop
