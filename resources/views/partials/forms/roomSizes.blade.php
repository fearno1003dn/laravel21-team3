

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new room size</div>

                <div class="panel-body">
                    <form class="form-horizontal">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Room Size Name</label>

                            <div class="col-md-6">
                              {!! Form::text('name',null,['class'=>'form-control']) !!}

                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Size</label>

                            <div class="col-md-6">
                              {!! Form::text('size',null,['class'=>'form-control']) !!}

                            @if ($errors->has('size'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Save Room Size
                                </button>
                            </div>
                        </div>

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
