<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    	return view('admin.profile.index',compact('user'));
    }

    public function update(Request $request,$id)
    {
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
