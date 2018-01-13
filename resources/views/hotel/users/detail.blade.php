@extends('hotel.users.index')
@section('content')
	<div class="box box-default" >
        <div class="box-header with-border" style="text-align: center;">
            <h3 class="box-title" ><strong>User Details</strong></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <ul style="padding-top: 33px;list-style-type: none;">
                        <li>
                            <strong style="padding-left: 400px">First Name :</strong> <b>{!!$user->first_name!!}</b>
                        </li>

                        <li style="padding-top: 15px;">
                            <strong style="padding-left: 400px">Last Name :</strong> <b>{!!$user->last_name!!}</b>
                        </li>
                        <li style="padding-top: 15px;">
                            <strong style="padding-left: 400px">E-Mail Address :</strong> <b>{!!$user->email!!}</b>
                        </li>

                        <li style="padding-top: 15px;">
                            <strong style="padding-left: 400px">Deposit :</strong> <b>{!! number_format($user->deposit) !!} $</b>
                        </li>
                        
                        <li style="padding-top: 15px;">
                            <strong style="padding-left: 400px">Phone Number :</strong> <b>+84{!!$user->phone_number!!}</b>
                        </li>

                        <li style="padding-top: 15px;">
                            <strong style="padding-left: 400px">Address :</strong> <b>{!!$user->address!!}</b>
                        </li>

                        <li style="list-style: none;padding-top: 15px;">
                            <a href="{{url('/user/edit')}}"><h4><i class="fa fa-edit" style="padding-left: 400px"></i>Edit</h4></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection