<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Validator;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\Room;

class BookingController extends Controller
{
    public function addBooking($id)
    {
          if(auth()->check())
          {            
             return view('reservation', compact('id'));
          }
          else
          {

            return view('login');
          }
     
    }
    public function CreateReservation(Request $request)
    {

      $validator = Validator::make($request->all(), [
        "phone_no"=>"required"
      ]);
    $start_date = date('Y-m-d', strtotime($request->checkin_date));
    $end_date = date('Y-m-d', strtotime($request->checkout_date));
    if ($end_date < $start_date) {
      return back()->with('error1','End Date should be greater than start date');
    }

    if ($validator->passes()) {
      $start_date = date('Y-m-d', strtotime($request->checkin_date));
      $end_date = date('Y-m-d', strtotime($request->checkout_date));

$checkRoom = Booking::where('room_id', $request->room_id)
      ->where(function ($query) use ($start_date,$end_date) {
          $query->where('start_date', '<', $end_date)
              ->where('end_date', '>', $start_date);
      })
      ->orWhere(function ($query) use ($start_date,$end_date) {
          $query->where('start_date', '>=', $start_date)
              ->where('end_date', '<=', $end_date);
      })
      ->orWhere(function ($query) use ($start_date,$end_date) {
          $query->where('start_date', '<', $start_date)
              ->where('end_date', '>', $end_date);
      })
      ->exists();
      if($checkRoom===true)
      {
        return back()->with('error','this room is not available for this date');
      }
      $start_date_obj = new DateTime($start_date);
      $end_date_obj = new DateTime($end_date);
      
      $interval = $start_date_obj->diff($end_date_obj);
      
      $number_of_days = $interval->days;
      
      $getprice=Room::where('id',$request->room_id)->first();
    
      $calculateprice=$getprice->price_per_night*$number_of_days;

     $Addbooking=new Booking();
     $Addbooking->start_date=$start_date;
     $Addbooking->end_date=$end_date;
     $Addbooking->phone_no=$request->phone_no;
     $Addbooking->user_id=Auth::id();
     $Addbooking->room_id=$request->room_id;
     $Addbooking->price=$calculateprice;
     $Addbooking->save();
     return back()->with('success','Room booked successfully');
     
    }
    else
    {
      return back()
      ->withErrors($validator)
      ->withInput();
    }
  }
    public function UserReservation()
    {
        $getuserbooking=Booking::where('user_id',Auth::id())->with('Room')->get();
        
        return view('myreservation',compact('getuserbooking'));
         
    }
    public function CancelBooking($id)
    {
        $Cancelbooking=Booking::where('id',$id)->delete();
        if($Cancelbooking)
        {
          return back()->with('success','Booking Cancelled Successfully');

        }
         else
        {
          return back()->with('error','Error Occured Try Again');

        }
         
    }
}
