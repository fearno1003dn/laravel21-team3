@foreach($roomTypes as $roomType)
    <option value="{{$roomType->name}}">{{$roomType->name}}</option>
    @endforeach