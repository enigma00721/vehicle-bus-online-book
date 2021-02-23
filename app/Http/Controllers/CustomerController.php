<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Booking;

class CustomerController extends Controller
{
    public function index()
    {
        // dd('you are customer!');
        $user = Auth::user();
    	return view('customer.index',compact('user'));
    }

    public function bookingHistory()
    {
        $id = auth()->user()->id;
        $bookings = Booking::where('customer_id',$id)->latest()->get();
        // dd($bookings);
        return view('customer.history',compact('bookings'));
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $user = User::where('id',$id)->first();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->has('password'))
            $user->password = bcrypt($request->get('password'));
        $check = $user->save();

        if($check)
            return redirect()->back()->with('msg','Proifle Updated Successfully!');
        else
            return redirect()->back()->with('error_msg','Profile Could Not Be Updated!');

    }
}
