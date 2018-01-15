<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Booking;
use Carbon\Carbon;


class DashBoardController extends Controller
{
  public function index()
  {
    $month =[0];
    $bookings =[0];
    $bookinglist =[0];
    $post = [0];
    // dd($post);
    $month = DB::table('bookings')->select(DB::raw('MONTH(updated_at) as month'))->get();
    // dd($month);
    // $monthNum = DB::table('bookings')->select(DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"))->get();
    // dd($monthNum);
    $bookings = DB::table('bookings')->select(DB::raw('count(*) as bookings'))->get();
    // dd($bookings);
    // dd(count($bookings));
    $post= Booking::select(DB::raw('YEAR(updated_at) year, MONTH(updated_at) month'))->get();
    // dd($post);
    $month= json_decode( json_encode($month), true);
    $bookings= json_decode( json_encode($bookings), true);

    $post= json_decode( json_encode($post), true);
    // dd($post);

    $bookinglist = DB::table('bookings')
        ->select(DB::raw('MONTHNAME(updated_at) as month'), DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"), DB::raw('count(*) as bookings'))
        ->groupBy("monthNum")
        ->get();
        $bookinglist= json_decode( json_encode($bookinglist), true);
    // dd($bookinglist);
    // dd($month);

      return view('admins.dashboard.content0')->with(['month'=>$month,'post'=>$post,'bookinglist'=>$bookinglist,'bookings'=>$bookings]);;
      // $xx = response()->json($bookinglist);
      // dd($xx);
      // return view('admins.dashboard.content',compact('xx'));
  }

  public function test()
  {
      $bookinglist = DB::table('bookings')
          ->select(DB::raw('MONTHNAME(updated_at) as month'), DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"), DB::raw('count(*) as bookings'))
          ->groupBy(DB::raw('monthNum'))
          ->get();

      return $bookinglist;
    }

    public function main()
    {
      $bookings =[];
      $cancels = [];
      for($i=0;$i<=12;$i++){

          $now = Carbon::now();
          // dd($now);
          // dd($now->month );
          $now->month = $i;
          $t1 = $now->startOfMonth()->toDateTimeString();
          // dd($t1);
          $t2 = $now->endOfMonth()->toDateTimeString();
          // dd($t2);


          $bookingQuant = Booking::whereBetween('created_at',[$t1,$t2])->where('status','!=','2')->get();
          $cancelQuant = Booking::whereBetween('created_at',[$t1,$t2])->where('status','2')->get();

          $quantity1 = count($bookingQuant);
          $quantity2 = count($cancelQuant);


          array_push( $bookings, $quantity1);
          array_push( $cancels, $quantity2);


  }
  // dd($bookings);
      $totalCheckouts = Booking::where('status','!=','2')->get();
      $totalCancels = Booking::where('status','2')->get();
      $totalCheckOutFee = 0;
      $totalCancelFee = 0;
      foreach($totalCheckouts as $totalCheckout){
        $totalCheckOutFee = $totalCheckOutFee + $totalCheckout->total;
      }
      foreach($totalCancels as $totalCancel){
        $totalCancelFee = $totalCancelFee + $totalCancel->total;
      }
      $latestBookings = Booking::where('status','!=','100')->orderBy('created_at','desc')->take(10)->get();
      // $pika = Carbon::now();
      // dd($pika);
      return view('admins.dashboard.content1',compact('bookings','cancels','totalCheckOutFee','totalCancelFee','latestBookings'));

    }

}
