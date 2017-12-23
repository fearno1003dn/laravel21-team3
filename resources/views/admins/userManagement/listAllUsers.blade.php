@extends('admins.layouts.index1')
@section('content_header')
    <h1>List All users</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-xs-12">

            <div class="box">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table  class="table table-bordered table-striped">
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

                                    <td>{!!$user->first_name!!} {!!$user->last_name!!} </td>
                                    <td>{!!$user->address!!}</td>
                                    <td>{!!$user->email!!}</td>
                                    <td>{!!$user->phone_number!!}</td>
                                    <td>
                                        {!!$user->role ? '<a>Admin User</a>' : '<a>Normal User</a>'!!}
                                    </td>
                                    <td><a href="{{url('admins/users/'.$user->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/users/'.$user->id.'/delete')}}"><i class="fa fa-trash"></i>Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                    <!-- /.box-body -->
                      {!! $users->links()!!}
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>

@stop
