@foreach ($roomTypes as $roomType)
    <option value="{{$roomType}}" {{(isset($_GET['roomType']) && $_GET['roomType'] == $roomType) ? 'selected' : '' }} >{{$roomType}}</option>
@endforeach