<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Contact;
use App\Region;
use App\Booking;
use App\Bus_Schedule;

class FrontController extends Controller
{
    protected $view_path = 'frontend.';
    
    public function index()
    {
        $regions = Region::all();
        return view($this->view_path.'index',compact('regions'));
    }

    public function about()
    {
    	return view($this->view_path.'about'  );
    }
    
    public function contact()
    {
    	return view($this->view_path.'contact' );
    }
    public function contactSubmit(Request $request)
    {
        // dd($request->all());
        $check = Contact::create($request->all());
        if($check)
            return redirect()->back()->with('msg','Your Message Was Sent!');
        else    
            return redirect()->back()->with('error_msg','Your Message Was Sent!');

    }

    public function listing(Request $request)
    {
        // dd('listing');
        $regions = Region::all();
        $request->validate([
            'from' => 'required',
            'destination' => 'required',
            'depart_date' => 'required|date',
        ]);
        
        // querying database with multiple request search parameters
        $query = Bus_Schedule::query();
        if ($request->from) {
            $query = $query->where('from', 'LIKE', '%' . $request->from . '%');
        }
        if ($request->destination) {
            $query = $query->where('destination', 'LIKE', '%' . $request->destination . '%');
        }
        if ($request->depart_date) {
            $query = $query->where('depart_date_time', 'LIKE', '%' . $request->depart_date . '%');
        }

        $schedules = $query->get();
        // dd($schedules);
        return view($this->view_path.'listing',compact('schedules','regions'));
    }

    public function schedules()
    {
        $schedules = Bus_Schedule::latest()->paginate(3);
        // dd($schedules);
        return view($this->view_path . 'schedules',compact('schedules'));
    }


    //  booking bus seat
    public function reserve($id)
    {
        $user = Auth::user();
        $schedule = Bus_Schedule::where('id',$id)->first();
        // dd($schedule->bus->total_seats);

        // count available seat for that bus
        $totalSeats = $schedule->bus->total_seats;
        $reserveSeats = Booking::where('schedule_id',$schedule->id)->where('status',1)->sum('seat_amount');
        // dd($reserveSeats);
        $availableSeats = $totalSeats-$reserveSeats;
        // dd($availableSeats);
        if($availableSeats > 0)
            return view($this->view_path . 'reserve' , compact('user','schedule','availableSeats'));
        else
            return redirect()->back()->with('error_msg','Sorry! All Seats are Reserved!');
    }
    public function reserveSubmit(Request $request)
    {
        // dd($request->all());
        $booking = Booking::create($request->all());
        if($booking)
            return redirect()->back()->with('msg','We will call you soon to confirm!');
        else
            return redirect()->back()->with('error_msg','Booking Not Submitted!');

    }

   

}
