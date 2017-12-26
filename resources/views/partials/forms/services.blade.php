

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new Service</div>

                <div class="panel-body">
                    <form class="form-horizontal">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Service Name</label>

                            <div class="col-md-6">
                              {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Service Price</label>

                            <div class="col-md-6">
                              {!! Form::text('price',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                              {!! Form::text('description',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary pull-right">
                                  Save Service
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
