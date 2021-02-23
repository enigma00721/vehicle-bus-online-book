<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Response;
use App\User;
use App\Booking;

class BookingController extends Controller
{
    public function index()
    {
        // using relationship
        $bookings = Booking::with(['user','bus','schedule'])->get();
        // dd($bookings);
    	return view('admin.booking.index',compact('bookings'));
    }

    //  update through ajax
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $booking = Booking::where('id',$request->id)->first();
        // dd($booking);
        $booking->status = $request->status;
        $check = $booking->save(); 

        if($check)
            return Response::json(['class' => 'Success','message' => 'Booking Status Updated Successfully!']);
        else
            return redirect()->back()->with('error_msg','Booking Status Could Not Be Updated!');
    }

    public function destroy($id)
    {
        $booking = Booking::where('id',$id)->first();
        $check = $booking->delete();
        if($check)
            return redirect()->back()->with('msg','Booking Deleted Successfully!');
        else
            return redirect()->back()->with('error_msg','Booking Could Not Be Deleted!');
    }
}
