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
        $user_info = new Employee_information();

        //img
        $user_info ->profile_picture = $request -> profile_picture;

        //string
        $user_info ->employee_name = $request -> employee_name;
        $user_info ->address1 = $request -> address1;
        $user_info ->address2 = $request -> address2;
        
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

        //img
        $user_info ->gov_id1 = $request -> gov_id1;
        $user_info ->gov_id2 = $request ->gov_id2;

        //text
        $user_info ->emergency_name = $request ->emergency_name;
        $user_info ->emergency_contactnum = $request -> emergency_contactnum;
        $user_info ->emergency_relationship = $request -> emergency_relationship;


        //img and or pdf
        $user_info ->file_cv = $request -> file_cv;
        $user_info ->file_tor = $request -> file_tor;
        $user_info ->file_certificate_of_former_employer = $request -> file_certificate_of_former_employer;
        $user_info ->img_sketch_of_residence = $request -> img_sketch_of_residence;


        //pdf only
        $user_info ->file_contract = $request ->file_contract;
        $user_info ->file_pledge = $request ->file_pledge;
        $user_info ->file_laptop_agreement = $request -> file_laptop_agreement;
        $user_info ->file_memo = $request -> file_memo;
        $user_info ->notice_to_explain = $request -> notice_to_explain;


        $user_info->save();
        return redirect()->route('manage.users.index');

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
