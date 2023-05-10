<?php

namespace App\Http\Controllers;
use App\Models\TimeOff;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TimeOffController extends Controller
{

    public function index()
    {
        $timeoffs = TimeOff::all();
        return view('time-off', compact('timeoffs'));
    }
    public function create()
    {
        return view('create-time-off');
    }
    public function store(Request $request)
    {

        // Handle File upload
        if($request->hasFile('file_attachment')){
            // get filename with the extention
            $fileNameWithExt = $request->file('file_attachment')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_attachment')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;


            //upload image working but not showing image
            // $path = $request->file('file_attachment')->storeAs('public',$fileNameToStore);


            //going to public
            $destinationPath = public_path().'/attachfile' ;
            $path = $request->file('file_attachment')->move($destinationPath,$fileNameToStore);

            //not working creating new folder called leavefile
            //$path = $request->file('file_attachment')->store('leavefile', ['disk' => 'public']);




            }else{

            $fileNameStore='noimage.jpg';
        }

        $timeoffs =new TimeOff();
        $timeoffs->employee_name = $request->employee_name;
        $timeoffs->start_date = $request->start_date;
        $timeoffs->end_date = $request->end_date;
        $timeoffs->leave_type = $request->leave_type;
        $timeoffs->leave_reason = $request->leave_reason;
        $timeoffs->file_attachment = $fileNameToStore;
        $timeoffs->save();

        return redirect()->route('timeoff');

    }

    public function show($id)
    {

        $leave = TimeOff::findOrFail($id);
        return view('view-timeoff', compact('leave'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $timeoff = TimeOff::findOrFail($id);
        return view('timeoff.edit', compact('timeoff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $timeoff = TimeOff::findOrFail($id);

        if($request->hasFile('file_attachment')){
            // get filename with the extention
            $fileNameWithExt = $request->file('file_attachment')->getClientOriginalName();

            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just Ext
            $extention = $request->file('file_attachment')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;


            // upload image
            $path = $request->file('file_attachment')->storeAs('public/leave_images',$fileNameToStore);

            }else{

            $fileNameStore='noimage.jpg';
        }
        $timeoff->employee_name = $request->employee_name;
        $timeoff->start_date = $request->start_date;
        $timeoff->end_date = $request->end_date;
        $timeoff->leave_type = $request->leave_type;
        $timeoff->leave_reason = $request->leave_reason;
        $timeoff->file_attachment = $fileNameToStore;
        $timeoff->save();
        return redirect()->route('timeoff');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $timeOffs = TimeOff::findOrFail($id);
        $timeOffs->delete();
        return redirect()->route('timeoff');






    }
}
