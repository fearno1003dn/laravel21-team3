

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new room type</div>

                <div class="panel-body">
                    <form class="form-horizontal">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Room Type</label>

                            <div class="col-md-6">
                              {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                              {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Save Room Type
                                </button>
                            </div>
                        </div>

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
