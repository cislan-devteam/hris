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
        $request->validate([
            'employee_name'=> 'required',
            'start_date'=> 'required|date',
            'end_date'=> 'required|date|after:start_date',
            'leave_type'=> 'required',
            'leave_reason' => 'required|max:255',
            'file_attachment'=> 'size:4000|mimes:jpeg,png,jpg,gif'
        ]);

        $timeoffs =new TimeOff();
        $timeoffs->employee_name = $request->employee_name;
        $timeoffs->start_date = $request->start_date;
        $timeoffs->end_date = $request->end_date;
        $timeoffs->leave_type = $request->leave_type;
        $timeoffs->leave_reason = $request->leave_reason;

        // Handle File  attachment upload
         if($request->hasFile('file_attachment')){

            //get filename with the extention
            $fileNameWithExt = $request->file('file_attachment')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_attachment')->getClientOriginalExtension();
            // Filename to store
            //$timeoffs -> file_attachment = $fileNameToStore = $fileName.'_'.time().'.'.$extention;

            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            $timeoffs -> file_attachment = $fileNameToStore;

            //going to public
            $destinationPath = public_path().'/attachfile';
            $request->file('file_attachment')->move($destinationPath,$fileNameToStore);

        }

        $timeoffs->save();
        return redirect()->route('timeoff')->with('success', 'Time-off added successfully');


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

        $timeoff = TimeOff::find($id);

        $request->validate([
            'employee_name'=> 'required',
            'start_date'=> 'required|date',
            'end_date'=> 'required|date|after:start_date',
            'leave_type'=> 'required',
            'leave_reason' => 'required|max:255',
            'file_attachment'=> 'size:4000|mimes:jpeg,png,jpg,gif'
        ]);

            $timeoff->employee_name = $request->employee_name;
            $timeoff->start_date = $request->start_date;
            $timeoff->end_date = $request->end_date;
            $timeoff->leave_type = $request->leave_type;
            $timeoff->leave_reason = $request->leave_reason;

        if($request->hasFile('file_attachment')){

            // get filename with the extention
            $fileNameWithExt = $request->file('file_attachment')->getClientOriginalName();

            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just Ext
            $extention = $request->file('file_attachment')->getClientOriginalExtension();

            // Filename to store in database
            $timeoff -> file_attachment = $fileNameToStore = $fileName.'_'.time().'.'.$extention;

            //going to public
            $destinationPath = public_path().'/attachfile';
            $request->file('file_attachment')->move($destinationPath,$fileNameToStore);

        }

        $timeoff->save();
        return redirect()->route('timeoff')->with('success', 'Time-off edited successfully');

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
    public function statusview($id)
    {
        $director = TimeOff::findOrFail($id);
        return view('directors-timeoff', compact('director'));
    }
    public function statusStore(Request $request)
    {
        $director = TimeOff::findOrFail($request->id);
        $director-> status = $request->status;
        $director->save();
        return redirect()->route('timeoff')->with('success', 'Approval of time-off added successfully');
    }
}
