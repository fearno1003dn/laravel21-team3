<!-- <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
        <tr>
        <th>Service Name</th>
        <th>Service Price</th>
        <th>Quantity</th>
        <th>Price</th>
        </tr>
        @foreach($bookroom as $br)
          @foreach($br->services as $service)
          <tr>
          <td>{{$service->name}}</td>
          <td>{!!number_format($service->price)!!}</td>
          <td>{{$service->pivot->quantity}}</td>
          <td>{!!number_format($serviceTotal)!!}đ</td>
          </tr>
          @endforeach
            @endforeach
        </table>
      </div>
    </div> -->

    <td>{!!number_format($serviceTotal)!!}đ</td>
    <td>{!!number_format($totalPrice)!!}đ</td>

    <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
            <tr>
            <th>Room</th>
            <th>Room Type Price</th>
            <th>Day Using</th>
            <th>Room Using Price</th>
            <th>Service Total Price</th>
            <th>Total Price</th>
            </tr>

            @foreach($bookroom as $br)

            <tr>
            <td>{{$br->rooms->name}}</td>
            <td>{!!number_format($br->rooms->price)!!}</td>
            <td>{{$diff2}} Days</td>
            <td>{$roomxDaysPrice}đ</td>

            </tr>

            @endforeach

            </table>
          </div>
        </div>



        @if($booking->promotions->discount)
        <div class="row">
          <div class="col-xs-6">
             <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Promotion Code:</th>

                    <td>{{ $booking->promotions->code }}</td>

                  </tr>

                  <tr>
                    <th>Discount:</th>

                    <td>{{ $booking->promotions->discount }}%</td>

                  </tr>
                  <tr>
                    <th style="width:50%">Rooms Total Price (Discounted):</th>
                    <td>{{number_format($totalPrice )}}đ@if($booking->status==1) <i class="fa fa-check-square"></i>@endif</td>
                  </tr>
                  <tr>
                    <th>Services Total Price:</th>
                    <td>{{number_format($serviceTotal)}}đ</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    @if($booking->status == 0)
                    <td>{{number_format($serviceTotal)}}đ</td>
                    @else
                    <td>{{number_format($totalPrice)}}đ</td>
                    @endif
                  </tr>
                </table>
          </div>
        </div>
      </div>
      @endif





      <tr>
      <th>Room</th>
      <th>Room Type Price</th>
      <th>Day Using</th>
      <th>Room Using Price</th>
      <th>Service Total Price</th>
      <th>Total Price</th>
      </tr>

      @foreach($bookroom as $br)

      <tr>
      <td>{{$br->rooms->name}}</td>
      <td>{!!number_format($br->rooms->price)!!}</td>
      <td>{{$diff2}} Days</td>
      <td>{!!number_format($roomxDaysPrice)!!}đ</td>
      <td>{!!number_format($serviceTotal)!!}đ</td>
      <td>{!!number_format($totalPrice)!!}đ</td>
      </tr>




      <td>{{$service->bookRoomServices->quantity}} Days</td>
      <td>{!!number_format($service->price * $service->bookRoomServices->quantity )!!}đ</td>

      @foreach($bookroom->services as $service)
      <tr>
      <td>{{$service->name}}</a></td>
      <td>{!!number_format($service->price)!!}</td>

      @endforech
