<!-- <div class="form-group">
    {!! Form::label('name','Name ') !!}
    <div class="form-controls">
        {!! Form::text('name',null,['class'=>'form-control']) !!}


    </div>

    {!! Form::label('room_type_id','Room type') !!}
    <div class="form-controls">
        {!! Form::select('room_type_id',$roomTypes,null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('room_size_id','Room Size') !!}
    <div class="form-controls}">
        {!! Form::select('room_size_id',$roomSizes,null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('price','Price') !!}
    <div class="form-controls">
        {!! Form::text('price',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('status','Status') !!}
    <div class="form-controls">
        {!! Form::radio('status', '1',['class'=>'form-control']) !!} Available <br>
        {!! Form::radio('status', '0',['class'=>'form-control']) !!} Not Available
    </div>

    {!! Form::label('description','Description') !!}
    <div class="form-controls">
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::label('images1','Upload Image 1') !!}
    <div class="form-controls">
        {!! Form::file('images1',['class'=>'form-control', 'id' => 'imageUpload']) !!}
    </div>

    {!! Form::label('images2','Upload Image 2') !!}
    <div class="form-controls">
        {!! Form::file('images2',['class'=>'form-control']) !!}
    </div>

    {!! Form::label('images3','Upload Image 3') !!}
    <div class="form-controls">
        {!! Form::file('images3',['class'=>'form-control']) !!}
    </div>

</div>

{!! Form::submit('Save Room',['class'=>'btn btn-primary pull-left']) !!} -->

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
