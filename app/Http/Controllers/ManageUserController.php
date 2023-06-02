<?php

namespace App\Http\Controllers;
use App\Models\Employee_information;

use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('manage.users.index' );
        // $
    }
    public function create()
    {

         return view('manage.users.create');

    }
    public function store(Request $request)
    {
        $request->validate([

            //Personal Info
            'employee_name' => 'required',
            'profile_picture' => 'required|mimes:jpg,jpeg,png,gif,svg',
            'address2' => 'required|max:255',
            'address1' => 'required|max:255',
            'email_address'=> 'required|email',
            'contact_number' => 'required|min:10|max:10',
            'birth_date' => 'required|date',
            'birth_place' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required',
            'position' => 'required',

            //Government ID Number
            'tin' => 'required|max:15',
            'sss_num' => 'required|max:12',
            'pagibig_num' => 'required|max:14',
            'philhealth_num' => 'required|max:14',

            //Government Docs
            'nbi_clearance' => 'required|mimes:jpg,jpeg,png,pdf,docx',
            'gov_id1' => 'required|mimes:jpg,jpeg,png',
            'gov_id2' => 'required|mimes:jpg,jpeg,png',

            //Emergency Contact Numbers
            'emergency_name' => 'required',
            'emergency_contactnum' => 'required|min:10|max:10',
            'emergency_relationship' => 'required',

            //file upload
            'file_cv' => 'required|mimes:jpg,jpeg,png,pdf,docx',
            'file_tor' => 'required|mimes:jpg,jpeg,png,pdf',
            'file_contract' => 'required|mimes:pdf,docx',
            'file_pledge' => 'required|mimes:pdf,docx',
            'file_certificate_of_former_employer' => 'required|mimes:jpg,jpeg,png,pdf,docx',
            'img_sketch_of_residence' => 'required|mimes:jpg,jpeg,png',
            'file_laptop_agreement' => 'required|mimes:pdf,docx',
            'file_memo' => 'mimes:pdf,docx',
            'notice_to_explain' => 'mimes:pdf,docx'
        ]);

        $user_info = new Employee_information();

        //Profile Picture
            // Handle File  attachment upload
            if($request->hasFile('profile_picture')){
                //get filename with the extention
                $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();
                // get just filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // get just Ext
                $extention = $request->file('profile_picture')->getClientOriginalExtension();
                $fileNameToStore = $fileName.'_'.time().'.'.$extention;
                //save in database ->
                $user_info -> profile_picture = $fileNameToStore;
                //going to public
                $destinationPath = public_path().'/profilepicture';
                $request->file('profile_picture')->move($destinationPath,$fileNameToStore);
            }

        //string
        $user_info ->employee_name = $request -> employee_name;
        $user_info ->address1 = $request -> address1;
        $user_info ->address2 = $request -> address2;
        $user_info ->email_address = $request -> email_address;

        //num
        $user_info ->contact_number = $request -> contact_number;

        //date
        $user_info ->birth_date= $request -> birth_date;

        //string
        $user_info ->birth_place = $request -> birth_place;
        $user_info ->civil_status = $request -> civil_status;
        $user_info ->nationality = $request -> nationality;
        $user_info ->position = $request -> position;

        //num
        $user_info ->tin = $request -> tin;
        $user_info ->sss_num = $request -> sss_num;
        $user_info ->pagibig_num = $request -> pagibig_num;
        $user_info ->philhealth_num = $request -> philhealth_num;

        $user_info ->nbi_clearance = $request -> nbi_clearance;
        //nbi_clearance
        if($request->hasFile('nbi_clearance')){
            //get filename with the extention
            $fileNameWithExt = $request->file('nbi_clearance')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('nbi_clearance')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> nbi_clearance = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/nbi_clearance_folder';
            $request->file('nbi_clearance')->move($destinationPath,$fileNameToStore);
        }


        //img gov id1
        if($request->hasFile('gov_id1')){
            //get filename with the extention
            $fileNameWithExt = $request->file('gov_id1')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('gov_id1')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> gov_id1 = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/gov_id';
            $request->file('gov_id1')->move($destinationPath,$fileNameToStore);
        }

        //govid2
        if($request->hasFile('gov_id2')){
            //get filename with the extention
            $fileNameWithExt = $request->file('gov_id2')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('gov_id2')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> gov_id2 = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/gov_id';
            $request->file('gov_id2')->move($destinationPath,$fileNameToStore);
        }

        //text
        $user_info ->emergency_name = $request ->emergency_name;
        $user_info ->emergency_contactnum = $request -> emergency_contactnum;
        $user_info ->emergency_relationship = $request -> emergency_relationship;

        //cv
        if($request->hasFile('file_cv')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_cv')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_cv')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_cv = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/cv';
            $request->file('file_cv')->move($destinationPath,$fileNameToStore);
        }

        //Transcript of Record
        if($request->hasFile('file_tor')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_tor')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_tor')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_tor = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/tor_folder';
            $request->file('file_tor')->move($destinationPath,$fileNameToStore);
        }

        //file_certificate_of_former_employer
        if($request->hasFile('file_certificate_of_former_employer')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_certificate_of_former_employer')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_certificate_of_former_employer')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_certificate_of_former_employer = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/former_employer';
            $request->file('file_certificate_of_former_employer')->move($destinationPath,$fileNameToStore);
        }

        //sketch of residence
        if($request->hasFile('img_sketch_of_residence')){
            //get filename with the extention
            $fileNameWithExt = $request->file('img_sketch_of_residence')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('img_sketch_of_residence')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> img_sketch_of_residence = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/sketch_of_resident';
            $request->file('img_sketch_of_residence')->move($destinationPath,$fileNameToStore);
        }

        //pdf only
        //file_contract
        if($request->hasFile('file_contract')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_contract')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_contract')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_contract = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/contract';
            $request->file('file_contract')->move($destinationPath,$fileNameToStore);
        }

        //Pledge
        $user_info ->file_pledge = $request ->file_pledge;
        if($request->hasFile('file_pledge')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_pledge')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_pledge')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_pledge = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/pledge';
            $request->file('file_pledge')->move($destinationPath,$fileNameToStore);
        }

        //laptop_agreement
        if($request->hasFile('file_laptop_agreement')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_laptop_agreement')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_laptop_agreement')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_laptop_agreement = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/laptop_agreement';
            $request->file('file_laptop_agreement')->move($destinationPath,$fileNameToStore);
        }
        //memo

        if($request->hasFile('file_memo')){
            //get filename with the extention
            $fileNameWithExt = $request->file('file_memo')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('file_memo')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> file_memo = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/memo';
            $request->file('file_memo')->move($destinationPath,$fileNameToStore);
        }

        //notice_to_explain
        if($request->hasFile('notice_to_explain')){
            //get filename with the extention
            $fileNameWithExt = $request->file('notice_to_explain')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just Ext
            $extention = $request->file('notice_to_explain')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            //save in database ->
            $user_info -> notice_to_explain = $fileNameToStore;
            //going to public
            $destinationPath = public_path().'/notice_to_explain';
            $request->file('notice_to_explain')->move($destinationPath,$fileNameToStore);
        }

        $user_info->save();
        return redirect()->route('manage.users.index')->with('success', 'Employee Information added successfully');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
