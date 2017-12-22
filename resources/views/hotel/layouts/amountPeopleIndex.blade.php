@foreach($amount_people as $room)
    <option value="{{$room->amount_people}}">Room {{$room->amount_people}} People</option>
@endforeach
