<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Response;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Region::all();
        return view('admin.regions.region-list', compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // dd($request->all());
        $this->validate($request, [
            'region_name' => 'required',
            'region_code' => 'required',
        ]);
       
        $row = Region::create($request->all());
        if($row)
            return redirect()->back()->with('msg','Region Registered Successfully!');
        else
            return redirect()->back()->with('msg','Region Could Not Be Registered Successfully!');
        
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
        $row = Region::where('id',$id)->first();
        $this->validate($request, [
            'region_name' => 'required',
            'region_code' => 'required|unique:regions,region_code,'.$id,
        ]);
        
        if($request->has('status')){
            $row->status = 0;
        }else{
            $row->status = 1;
        }
        $row->save();
        if($row->update($request->only(['region_name','region_code']))){
            return Response::json(['class' => 'Success','message' => 'Region Updated Successfully!']);
        }
        else
            return redirect()->back()->with('msg', 'Region Update Failed!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Region::where('id',$id)->first();
        $check = $row->delete();
        if($check)
            return redirect()->back()->with('msg','Region Deleted Successfully!');
        else
            return redirect()->back()->with('msg','Region Failed To Delete!');
    }
}
