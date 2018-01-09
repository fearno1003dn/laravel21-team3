@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All users</h1>
@stop

@section('content')

    @if(count($users)==0)
    <div class="row">
      <div class="box-header">
          <p>Sorry we found nothing</p>
      </div>
    </div>
    @endif

    @if(count($users)!=0)
    <div class="row">
      <div class="col-xs-12">
          <div class="box-header">
            <a>.</a>
              @include('partials.forms.search',['url'=>'admins/users/search'])
            </div>
            <div class="box">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>User Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($users as $user)
                                <tr>

                                    <td><a href="{{url('admins/users/listbooking/'.$user->id)}}" >{!!$user->first_name!!} {!!$user->last_name!!}</a>
                                    </td>
                                    <td>{!!$user->address!!}</td>
                                    <td>{!!$user->email!!}</td>
                                    <td>{!!$user->phone_number!!}</td>
                                    <td>
                                        {!!$user->role ? '<a>Admin User</a>' : '<a>Normal User</a>'!!}
                                    </td>
                                    <td><a href="{{url('admins/users/'.$user->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/users/'.$user->id.'/delete')}}" class="fa fa-trash" onclick="return confirm('Are you sure you want to delete this user?');" data-confirm="Are you sure to delete this user?">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                    <!-- /.box-body links-->

                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
          </div>
        </div>
    @endif

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
