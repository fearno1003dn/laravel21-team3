@extends('hotel.users.index')
@section('content')
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 lead">User profile<hr></div>
          </div>
          <div class="row">
			<div class="col-md-4 text-center">
              <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                  <h3 class="only-bottom-margin"> {!!$user->first_name!!} {!!$user->last_name!!}</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6" >
                  <table>
                  <tr>
                    <td>
                  <span class="text-muted">Email:</span> </td>
                   <td>{!!$user->email!!}</td>
                 </tr>

                  <tr>
                    <td>
                  <span class="text-muted">Deposit:</span> </td>
                  <td>{!! number_format($user->deposit) !!} $</td>
                </tr>
                <tr>
                  <td>
                  <span class="text-muted">Phone Number:</span></td>
                  <td> (+84) {!!$user->phone_number!!}</td>
                </tr>
                <tr>
                  <td>
                  <span class="text-muted">Address:</span></td>
                  <td> {!!$user->address!!}</td></tr>
                </table>
                </div>
                <div class="col-md-6">
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-comment text-muted"></i> 500
                  </div>
                  <div class="activity-mini">
                    <i class="glyphicon glyphicon-thumbs-up text-muted"></i> 1500
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr><a href="{{url('/user/edit')}}" class="btn btn-default pull-right"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
