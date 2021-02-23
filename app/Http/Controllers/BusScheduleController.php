<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus_Schedule;
use App\Region;
use App\Buses;
use App\Operator;
class BusScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Bus_Schedule::all();
        $regions = Region::statusActive()->get();
        $buses = Buses::statusActive()->get();
        $operators = Operator::all();

        return view('admin.bus_schedule.bus-schedule-list',
        compact('schedules','regions','buses','operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'bus_id' => 'required',
            'operator_id' => 'required',
            'from' => 'required',
            'destination' => 'required',
            'depart_date_time' => 'required',
            'return_date_time' => 'required',
            'pickup_address' => 'required',
            'dropoff_address' => 'required',
            'price' => 'required|numeric',
        ]);
        $row = Bus_Schedule::create($request->all());
        if($row)
            return redirect()->back()->with('msg','New Schedule Registered Successfully!');
        else
            return redirect()->back()->with('error_msg','Bus Schedule Could Not Be Registered!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Bus_Schedule::where('id',$id)->first();
        // dd($schedule);
        $regions = Region::statusActive()->get();
        $buses = Buses::statusActive()->get();
        $operators = Operator::all();
        return view('admin.bus_schedule.edit-schedule',compact('schedule','regions','buses','operators'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $schedule = Bus_Schedule::where('id',$id)->first();
        $check = $schedule->update($request->all());
        if($request->has('status')){
            $schedule->status = 0;
        }else{
            $schedule->status = 1;
        }
        $schedule->save();

        if($check)
            return redirect()->route('bus-schedule.index')->with('msg','Bus Schedule Updated Successfully!');
        else
            return redirect()->back()->with('error_msg','Bus Schedule Could Not Be Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Bus_Schedule::where('id',$id)->first();
        $check = $schedule->delete();
        if($check)
            return redirect()->back()->with('msg','Bus Schedule Deleted Successfully!');
        else
            return redirect()->back()->with('error_msg','Bus Schedule Could Not Be Deleted!');
    }
}
