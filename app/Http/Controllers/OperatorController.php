<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use Response;
class OperatorController extends Controller
{

    protected $image_path = '/operator_images/';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::all();
        return view('admin.operators.operator-list', compact('operators'));
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
        // we are validating our inputs okay to avoid having error when inserting okay.
        $this->validate($request,[
            'operator_name' => 'required',
             'operator_email' => 'required|email|unique:operators,operator_email,'.$request->id,
             'operator_address' => 'required',
             'operator_phone' => 'required|max:40',
             'operator_logo' => 'required|image|max:2048',
        ]);


            $image =  $request->file('operator_logo');
            $image_name = $this->imageUpload($image);


            $operators = new Operator;
            $operators->operator_name = $request->operator_name;
            $operators->operator_email = $request->operator_email;
            $operators->operator_address = $request->operator_address;
            $operators->operator_phone = $request->operator_phone;
            $operators->operator_logo = $image_name;

                // dd($operators);
            $operators->save(); // THIS SAVE FUNCTION WILL SAVE THE DATA in Database

            return redirect()->back()->with('msg', 'Operator Added Succssfully!');
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
    
    public function edit($id)
    {
        $operator = Operator::where('id',$id)->first();
        // dd($operator);
        return view('admin.operators.edit-operator',compact('operator'));
        
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
        $operator = Operator::where('id',$id)->first();
        $this->validate($request, [
            'operator_name' => 'required',
            'operator_phone' => 'required',
            'operator_email' => 'required|unique:operators,operator_email,'.$id,
            'operator_address' => 'required',
            'image' => 'image|max:2048',
        ]);
        
        // check if image is submitted and upload to public folder
        if($request->hasFile('image')){
            $image =  $request->file('image');
            $image_name = $this->imageUpload($image);       // method call

            //  delete old image
            $file_path = public_path() . $this->image_path . $operator->operator_logo;
            $this->imageDelete($file_path);

            $request->request->add([
                'operator_logo'=>$image_name
            ]);
        }
        
        if($request->has('status')){
            $operator->status = 0;
        }else{
            $operator->status = 1;
        }
        $operator->save();

        $check = $operator->update($request->all());

        if($check)
            return redirect()->route('operator.index')->with('msg','Operator Updated Successfully!');
        else
            return redirect()->back()->with('msg','Operator Failed To Update!');

    }

   
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Operator::where('id',$id)->first();

         // first delete image
        $file_path = public_path() . $this->image_path . $row->operator_logo;
        $this->imageDelete($file_path);     // method call

        // delete row
        $check = $row->delete();

        if($check)
            return redirect()->back()->with('msg','Operator Deleted Successfully!');
        else
            return redirect()->back()->with('msg','Operator Failed To Delete!');
    }
}
