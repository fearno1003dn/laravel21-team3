

{{ Form::open(['method'=>'GET','url'=>$url,'class'=>'box-tools', 'role'=>'search'],array('class'=>'box-tools', 'role'=>'search'), array('action' => 'RoomController@searchRoom')) }}
  {{ csrf_field() }}
  <div class="input-group input-group-sm" style="width: 150px;">
      <input type="text" name="search" class="form-control pull-right" placeholder="Search..." value="{{old('search') }}">

      <div class="input-group-btn">
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      </div>
    </div>
{!! Form::close() !!}
