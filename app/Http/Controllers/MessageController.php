<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class MessageController extends Controller
{
   
     public function messages()
    {
        $messages = Contact::all();
        return view('admin.messages.index',compact('messages'));

    }

    public function destroy($id)
    {
        $message = Contact::where('id',$id)->first();
        $check = $message->delete();
        if($check)
            return redirect()->back()->with('msg','Message Deleted Successfully!');
        else
            return redirect()->back()->with('error_msg','Message Could Not Be Deleted!');
    }
}
