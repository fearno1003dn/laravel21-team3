{{$roomTypesesstion = session()->get('roomType')}}
@foreach($roomTypes as $roomtype)
    @if($roomTypesesstion == $roomtype->name)
    <option value="{{$roomtype->name}}" selected="selected"
            >{{$roomtype->name}}</option>
        @else
        <option value="{{$roomtype->name}}"
        >{{$roomtype->name}}</option>
    @endif
@endforeach