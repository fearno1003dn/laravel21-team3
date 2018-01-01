@extends('admins.layouts.index1')
@section('content_header')
    <h1>Booking {!!$booking->name!!} ID {!! $booking->code !!}</h1>
@stop

@section('content')


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title" style="padding-top: 25px;"><strong>Booking Details</strong></h3>
    </div>
    <div class="box-body">

     <div class="container">
       <div class="row">


         <div class="col-lg-6 col-md-6 col-sm-6">

             <div  class="col-sm-12 btn btn-primary "><h2 class="h2">Info</h2></div>

              <div class="room-detail_overview">

                 <table class="simple">

                   <ul>
                  <tr>
                    <td><li>
                        <strong>User Name </strong>:
                    </li></td>
                    <td><span>{!! $booking->users->first_name !!} {!! $booking->users->last_name !!}</span> </td>
                  </tr>

                  <tr>
                    <td> <li>
                         <strong>Booking ID </strong> :
                     </li></td>
                    <td>{!! $booking->code !!}</td>
                  </tr>

                  <tr>
                    <td><li> <strong>Check In </strong> : </li></td>
                    <td>{!! $booking->check_in !!}</td>
                  </tr>

                  <tr>
                    <td><li>
                        <strong>Expected Check Out </strong> :
                    </li></td>
                    <td> {!! $booking->check_out !!}</td>
                  </tr>

                  <tr>
                    <td> <li>
                         <strong>Time Now </strong> :
                     </li></td>
                    <td>{!! $now !!}</td>
                  </tr>

                  <tr>
                    <td><li><strong>Room Service:</strong></li></td>
                    <td>Avaible</td>
                  </tr>

                  <tr>
                    <td><li>
                        <strong>Expected Days</strong> :
                    </li></td>
                    <td> {!! $diff1 !!}</td>
                  </tr>

                  <tr>
                    <td><li>
                        <strong>Reality Days</strong> :
                    </li></td>
                    <td>{!! $diff2 !!}</td>
                  </tr>

                  <tr>
                    <td><li>
                        <strong>Promotion Code </strong> :
                    </li></td>
                    <td>{!! $booking->promotions->code !!}</td>
                  </tr>

                  <tr>
                    <td><li><strong>Discount</strong>:</li></td>
                    <td>{!! $booking->promotions->discount !!}%</td>
                  </tr>

                  <tr>
                    <td>  <li>
                          <strong>Status </strong> :

                      </li></td>
                    <td>{!!$booking->status ? '<span>Available</span>' : '<span>Not Available</span>'!!}</td>
                  </tr>

                  <tr>
                    <td>
                      <a href="{{url('admins/bookings/detail/'.$booking->id.'/checkout')}}" class='btn btn-primary'>Check Out</a>
                  </td>
                  </tr>

                </ul>
              </table>

           </div>
         </div>

          @foreach($bookroom as $br)
         <div class="col-lg-6 col-md-6">
           <div>
            -------------------------------------------------------------------------------------------------------------------------
          </div>
            <div class="col-lg-12 ">
                <p class='btn btn-default pull-left'><strong>Room : </strong>{{$br->rooms->name}}</p>
                <a href="{{url('admins/bookings/detail/'.$br->booking_id.'/'.$br->room_id.'/addservice')}}" class='btn btn-default pull-right'><i class="fa fa-plus"></i>Add Service</a>
            </div>
           <div class="room-detail_overview">


               <div class="box-body table-sm">
                 <table class="table table-sm table-hover">
                   <tr>
                     <th>Service Name</th>
                     <th>Price</th>
                     <th>Quantity</th>
                     <th>Total</th>
                     <th>Action</th>
                  </tr>
                   @foreach($br->services as $service)
                   <tr>
                     <td>{{$service->name}}</td>
                      <td>{{$service->price}}</td>
                      <td>{{$service->pivot->quantity}}</td>
                      <td>{{$service->price * $service->pivot->quantity}}</td>
                     <td>
                       <a href="{{url('admins/bookings/detail/'.$br->booking_id.'/'.$br->room_id.'/'.$service->pivot->id.'/delete')}}"><i class="fa fa-trash"></i> Delete</a></td>
                   </tr>

                   @endforeach

                 </table>
               </div>
               <a href="{{url('admins/bookings/detail/'.$br->booking_id.'/'.$br->room_id.'/checkout')}}" class='btn btn-primary pull-right'>Check Out</a>

              </div>
                 <div>
                  -----------------------------------------------------------------------------------------------------------



           </div>
         </div>
         @endforeach
       </div>
     </div>
   </div>
 </div>

@stop
