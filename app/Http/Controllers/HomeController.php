<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus_Schedule;
use App\Region;
use App\Contact;
use App\Buses;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schedules = Bus_Schedule::count();
        $regions = Region::count();
        $buses = Buses::count();
        return view('admin.admin-dashboard',compact('schedules','buses','regions'));
    }

}
