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
          <p>   Here are results that match your search</p>
            @include('partials.forms.search',['url'=>'admins/users/search'])
          </div>
          <div class="col-xs-12">
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
                              <td><a href="{{url('admins/users/'.$user->id.'/edit')}}" ><i class="fa fa-edit"></i>Edit</a> - <a href="{{url('admins/users/'.$user->id.'/delete')}}" class="fa fa-trash" onclick="return confirm('Are you sure you want to delete this user?');" data-confirm="Are you sure to delete this user?">Delete</a></td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {!! $users->appends($_GET)->links()!!}
        </div>
        <!-- /.col -->
    </div>
    @endif
@stop
