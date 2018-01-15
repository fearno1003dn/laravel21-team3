<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new room</div>

                <div class="panel-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                          {!! Form::label('name','Room Name',['class'=>'col-md-4 control-label']) !!}
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
                              {!! Form::label('room_type_id','Room Type',['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                              {!! Form::select('room_type_id',$roomTypes,null,['class'=>'form-control']) !!}

                            @if ($errors->has('room_type_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('room_type_id') }}</strong>
                                </span>
                            @endif
                          </div>
                      </div>

                      <div class="form-group">
                            <label for="room_size_id" class="col-md-4 control-label">Room Size</label>
                            <div class="col-md-6">
                              {!! Form::select('room_size_id',$roomSizes,null,['class'=>'form-control']) !!}

                            @if ($errors->has('room_size_id'))

                                <span class="text-danger">
                                    <strong>{{ $errors->first('room_size_id') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                      <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>
                            <div class="col-md-6">
                              {!! Form::text('price',null,['class'=>'form-control']) !!}

                            @if ($errors->has('price'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                      <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                              {!! Form::radio('status', '2',['class'=>'form-control']) !!} Available <br>
                              {!! Form::radio('status', '0',['class'=>'form-control']) !!} Not Available

                            @if ($errors->has('status'))
                                  <span class="text-danger">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                      <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>
                            <div class="col-md-6">
                              {!! Form::textarea('description',null,['class'=>'form-control']) !!}

                            @if ($errors->has('description'))
                                  <span class="text-danger">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                      <div class="form-group">
                            <label for="image1" class="col-md-4 control-label">Image 1</label>
                            <div class="col-md-6">
                              {!! Form::file('image1',['class'=>'form-control', 'id' => 'image1']) !!}

                            @if ($errors->has('image1'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('image1') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                      <div class="form-group">
                            <label for="image2" class="col-md-4 control-label">Image 2</label>
                            <div class="col-md-6">
                              {!! Form::file('image2',['class'=>'form-control', 'id' => 'image2']) !!}

                            @if ($errors->has('image2'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('image2') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                      <div class="form-group">
                            <label for="image3" class="col-md-4 control-label"> Image 3</label>
                            <div class="col-md-6">
                              {!! Form::file('image3',['class'=>'form-control', 'id' => 'image3']) !!}

                            @if ($errors->has('image3'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('image3') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Save Room
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
