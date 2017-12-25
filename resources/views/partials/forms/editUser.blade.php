<!-- <div class="form-group">
    {!! Form::label('username','User Name') !!}
    <div class="form-controls}">
        {!! Form::text('username',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('password','Password') !!}
    <div class="form-controls">
        {!! Form::text('password',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('address','Address') !!}
    <div class="form-controls">
        {!! Form::textarea('address',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('country','Country') !!}
    <div class="form-controls">
        {!! Form::textarea('country',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('province','Province') !!}
    <div class="form-controls">
        {!! Form::textarea('province',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('city','City') !!}
    <div class="form-controls">
        {!! Form::textarea('city',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('email','Email') !!}
    <div class="form-controls">
        {!! Form::textarea('email',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('phone_number','Phone Number') !!}
    <div class="form-controls">
        {!! Form::textarea('phone_number',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('role','Role') !!}
    <div class="form-controls">
        {!! Form::radio('role', '1',['class'=>'form-control']) !!} Normal User
        {!! Form::radio('role', '0',['class'=>'form-control']) !!} Admin User
    </div>

    {!! Form::label('deposit','Deposit') !!}
    <div class="form-controls">
        {!! Form::textarea('deposit',null,['class'=>'form-control']) !!}
    </div>

</div>
{!! Form::submit('Save User',['class'=>'btn btn-primary pull-left']) !!} -->



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
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                              {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                              {!! Form::text('email',null,['class'=>'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                              {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                              {!! Form::text('address',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                              {!! Form::radio('role', '0',['class'=>'form-control']) !!} Normal User
                              {!! Form::radio('role', '1',['class'=>'form-control']) !!} Admin User
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
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
