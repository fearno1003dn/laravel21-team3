@foreach ($sizes as $size)
    <option value="{{$size}}" {{(isset($_GET['size']) && $_GET['size'] == $size) ? 'selected' : '' }} >{{$size}}</option>
@endforeach