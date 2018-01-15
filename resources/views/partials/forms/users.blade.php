
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new user</div>
                <div class="panel-body">
                    <form class="form-horizontal">
                      <table  class="table table-bordered table-striped">
                        <div class="form-group">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                              {!! Form::text('first_name',null,['class'=>'form-control']) !!}

                            @if ($errors->has('first_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                              {!! Form::text('last_name',null,['class'=>'form-control']) !!}

                            @if ($errors->has('last_name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                              {!! Form::text('email',null,['class'=>'form-control']) !!}

                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-8 control-label">Password</label>
                            <div class="col-md-24">
                              {!! Form::password('password',null,['class'=>'form-control']) !!}

                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6">
                              {!! Form::text('phone_number',null,['class'=>'form-control']) !!}

                            @if ($errors->has('phone_number'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                              {!! Form::text('address',null,['class'=>'form-control']) !!}

                            @if ($errors->has('address'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>
                            <div class="col-md-6">
                              {!! Form::radio('role', '0',['class'=>'form-control']) !!} Normal User
                              {!! Form::radio('role', '1',['class'=>'form-control']) !!} Admin User

                            @if ($errors->has('role'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary pull-right">
                                  Save User
                              </button>
                          </div>
                        </div>
                      </table>
                      @if ( $errors->any() )
                      <div class="form-group">
                        <label for="errors" class="col-md-4 control-label">Summary All Errors</label>
                        <div class="col-md-6">
                      @if ( $errors->any() )
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      @endif
                    </div>
                    </div>
                      @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
