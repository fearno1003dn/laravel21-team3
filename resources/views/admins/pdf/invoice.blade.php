<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div style="float: left;"><img src="images/logos/logo.png" ></div>
        <div style="float: right;">
            <h3>FROM SUNNY HOTEL HA LINH WITH LOVE</h3>
            <H4 style="text-align: left;">Address: Da Nang City</h4>
            <H4 style="text-align: left;">Hotline: 0128.948.0359</h4>
            <H4 style="text-align: left;">Email: tung.tranduy0@gmail.com</h4>
        </div>
        <div style="clear: both;">

        </div>
        <div>
            <h2 style="text-align: center;">INVOICE</h2>
            <table class="table table-bordered" id="mytable" border="0" style="width: 90%; margin: auto;">
                <tr>
                    <th>Name:</th>
                    <td>{{$booking->users->first_name}} {{$booking->users->last_name}}</td>
                </tr>
                <tr>
                    <th>phone number:</th>
                    <td>(+84) {{$booking->users->phone_number}} </td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$booking->users->email}}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{$booking->users->address}}</td>
                </tr>
            </table><br>

            <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                <tr>
                    <th class="myth" style="text-align: center; width: 15%;">Booking code</th>
                    <th class="myth" style="text-align: center; width: 25%;">Date</th>
                    <th class="myth" style="text-align: center; width: 25%;">Service Price</th>
                    <th class="myth" style="text-align: center; width: 25%;">Total Price</th>

                </tr>
                <tr>
                    <td style="text-align: center; width: 15%;">#{{$booking->code}}</td>
                    <td style="text-align: center; width: 25%;">{{$now}}</td>
                    <td style="text-align: center; width: 25%;">{{number_format($serviceTotal)}} $</td>
                    <td style="text-align: center; width: 25%;">{{number_format($totalPrice)}} $</td>
                </tr>
            </table>

            <h3 style="text-align: center;">Room Price Details</h3>

             <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                 <tr>
                     <th class="myth" style="text-align: center; width: 25%;">Room</th>
                     <th class="myth" style="text-align: center; width: 25%;">Room Type Price</th>
                     <th class="myth" style="text-align: center; width: 25%;">Day Using</th>
                     <th class="myth" style="text-align: center; width: 25%;">Price</th>
                 </tr>
                 @foreach($bookroom as $br)
                 <tr>
                     <td style="width: 25%;">{{$br->rooms->name}}</td>
                     <td style="text-align: center; width: 25%;">{!!number_format($br->rooms->price)!!}</td>
                     <td style="text-align: center; width: 25%;">{{$diff1}} Days</td>
                     <td style="text-align: center; width: 25%;">{!!number_format($br->rooms->price * $diff1)!!} $</td>


                 </tr>
                 @endforeach
             </table><br>


             <h3 style="text-align: center;">Service Price Details</h3>
             @foreach($bookroom as $br)
             <p class='btn btn-default pull-left'><strong>Room : </strong>{{$br->rooms->name}}</p>
              <table class="table table-bordered" id="mytable" border="1" style="width: 90%; margin: auto;">
                  <tr>
                      <th class="myth" style="text-align: center; width: 25%;">Service Name</th>
                      <th class="myth" style="text-align: center; width: 25%;">Price</th>
                      <th class="myth" style="text-align: center; width: 25%;">Quantity</th>
                      <th class="myth" style="text-align: center; width: 25%;">Total</th>
                  </tr>


                @foreach($br->services as $service)
                  <tr>
                      <td style="width: 25%;">{{$service->name}}</td>
                      <td style="text-align: center; width: 25%;">{{$service->price}} $</td>
                      <td style="text-align: center; width: 25%;">{{$service->pivot->quantity}}</td>
                      <td style="text-align: center; width: 25%;">{{$service->price * $service->pivot->quantity}} $</td>

                  </tr>
                  @endforeach

              </table>
                @endforeach
                <br>
        </div>
    </body>
</html>
