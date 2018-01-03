@extends('admins.layouts.index1')
@section('content')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <form class="form-horizontal" action="{{url('admins/bookings/detail/'.$booking->id.'/checkout')}}"
                          method="post">
                        {{csrf_field()}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Check out</strong> Room</h3>
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <p>Please pay the due money if any and complete your check out information. Thank
                                    you!</p>
                            </div>
                            <div class="panel-footer">
                                @if(session('checkout'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span
                                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <strong>Success! </strong> {{session('checkout')}}
                                    </div>
                                @endif
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Check In Time</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block"
                                              id="billing">{{$booking->check_in}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Total Bill</label>

                                    <div class="col-md-6 col-xs-12">
                                        <span class="help-block"
                                              id="billing">{{$booking->total }} {{config('app.currency','Dollars')}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Paid Bill</label>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Due Bill</label>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Days Stayed</label>

                                    <div class="col-md-6 col-xs-12">
                                        <input type="number" class="form-control" name="days"
                                               placeholder="how many days client has stayed, please input manually.."/>
                                        <span class="help-block"
                                              id="billing">How many days spend from check in time?</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Amount paying</label>

                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span
                                                        class="fa fa-money"></span></span>
                                            <input class="form-control"
                                                   value="" type="number"
                                                   name="amount"/>
                                        </div>
                                        <span class="help-block">Please pay the due bill and submit the form!</span>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default">Clear Form</button>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Room Booked</strong> Information</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>Information about this room and person who is currently living here..</p>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <tr>
                                    <th>Customer Name</th>

                                </tr>
                                <tr>
                                    <th>Address</th>

                                </tr>
                                <tr>
                                    <th>Phone Number</th>

                                </tr>
                                <tr>
                                    <th>Email</th>

                                </tr>

                                <tr>
                                    <th>Room Information</th>

                                </tr>
                                <tr>
                                    <th>Billing</th>
                                    <td><p><strong>Total Bill</strong> {{ $booking->total}}</p>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Check in Time</th>

                                </tr>
                                <tr>
                                    <th>Expected Check out Time</th>

                                </tr>
                                <tr>
                                    <th>Realistic Check out Time</th>

                                </tr>
                                <tr>
                                    <th>Booking Code</th>

                                </tr>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <label class="label label-info">Powered By {{config('app.name','Hotel Management')}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
