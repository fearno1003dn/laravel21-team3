{{$size_sesstion = session()->get('size')}}
@foreach($sizes as $size)
    @if($size_sesstion == $size->size)
        <option value="{{$size->size}}" selected="selected"
        >{{$size->name}}</option>
    @else
        <option value="{{$size->size}}"
        >{{$size->name}}</option>
    @endif
@endforeach