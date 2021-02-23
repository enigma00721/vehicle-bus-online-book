<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use App\Buses;
use Response;
class BusController extends Controller
{

    protected $image_path = '/bus_images/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::all();
        $buses = Buses::all();
        return view('admin.buses.bus-list', compact('operators', 'buses'));
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
            'bus_name' => 'required',
            'total_seats' => 'required',
            'bus_code' => 'required',
            'operator_id' => 'required',
            'imagefile' => 'required',
        ]);
        
        // store image file if any
        $image =  $request->file('imagefile');
        if($image){
            $image_name = $this->imageUpload($image);
        }
        // dd($image_name);
        $request->request->add([
            'image'=>$image_name
        ]);
    //    dd($request->all());
        $row = Buses::create($request->all());
        if($row)
            return redirect()->back()->with('msg','Bus Register Successfully!');
        else
            return redirect()->back()->with('msg','Bus Could Not Be Registered Successfully!');
           
    }

    // image upload code
    // store image in public folder
    //  and return image name
    public function imageUpload($image)
    {
        $image_name = rand() . '.' . $image->getClientOriginalExtension();  // image name
        $image->move(public_path($this->image_path), $image_name);   // image move to folder

        return $image_name;
    }

    // image delete stored in public folder
    public function imageDelete($file_path)
    {
        if (file_exists($file_path)) 
            unlink($file_path);
    }

 
    // we can use anther validation if we want but i will show you how to work on that also okay
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Buses::where('id',$id)->first();
        $operators = Operator::all();
        // dd($operator);
        return view('admin.buses.edit-bus',compact('bus','operators'));

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
        $row = Buses::where('id',$id)->first();
        $this->validate($request, [
            'bus_name' => 'required',
            'total_seats' => 'required',
            'bus_code' => 'required|unique:buses,bus_code,'.$id,
            'operator_id' => 'required',
        ]);

         // check if image is submitted and upload to public folder
        if($request->hasFile('imagefile')){
            $image =  $request->file('imagefile');
            $image_name = $this->imageUpload($image);       // method call

            //  delete old image
            if($row->image){
                $file_path = public_path() . $this->image_path . $row->image;
                $this->imageDelete($file_path);
            }

            $request->request->add([
                'image'=>$image_name
            ]);
        }
        // status change/update
        if($request->has('status')){
            $row->status = 0;
        }else{
            $row->status = 1;
        }
        $row->save();

        // if($row->update($request->only('bus_name','total_seats','bus_code','operator_id'))){
        if($row->update($request->all())){
         return redirect()->route('bus.index')->with('msg','Bus Updated Successfully!');
        }
        else
            return redirect()->back()->with('msg', 'Bus Update Failed!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Buses::where('id',$id)->first();

        // first delete image
        if($row->image){
            $file_path = public_path() . $this->image_path . $row->image;
            $this->imageDelete($file_path);     // method call
        }

        // delete row
        $check = $row->delete();

        if($check)
            return redirect()->back()->with('msg','Bus Deleted Successfully!');
        else
            return redirect()->back()->with('msg','Bus Failed To Delete!');
    }
}
