<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Validator;
class RoomController extends Controller
{
    public function CheckRoomAvalaible(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "checkin_date"=>'required',
            "checkout_date"=>'required',
        ]);
        $start_date = date('Y-m-d', strtotime($request->checkin_date));
        $end_date = date('Y-m-d', strtotime($request->checkout_date));
        if ($end_date < $start_date) {
            return back()->with('error1','End Date should be greater than start date');
        }
        if ($validator->passes()) {
            $findRoom = Room::whereDoesntHave('bookings', function ($query) use ($start_date, $end_date) {
                $query->where(function ($query) use ($start_date, $end_date) {
                    $query->where('start_date', '<', $end_date)
                          ->where('end_date', '>', $start_date);
                });
            })->get();

            return view('rooms',compact('findRoom'));
        }else
        {
            return back()
            ->withErrors($validator) // Pass the validation errors back to the form
            ->withInput();
        }
    }
    public function ShowAllRooms(Request $request)
    {
      $Rooms=room::all();
      return view('Allrooms',compact('Rooms'));
    }
}
