<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\employee_information;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DB::table('user_roles')
        ->join('users', 'user_roles.user_id' , '=', 'users.id')
        ->join('roles', 'user_roles.role_id', '=', 'roles.id')
        ->select('users.name','users.email', 'roles.role_name', 'user_roles.user_id')
        ->get();

        return view('tasks', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $userRole = new UserRole();
        $userRole->user_id = $user->id;
        $userRole->role_id = $request->role_id;
        $userRole->save();

        return redirect()->route('tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('view-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/tasks');
    }

    public function displayInfo()
    {
        if (auth()->check()) {
            $user = auth()->user();

            $infos = employee_information::where('id', $user->id)->get();

            return view('profile.show')->with('infos', $infos);
        }

        else {
            return redirect('/')->with('error', 'You must be logged in to view this page.');
        }
    }

    public function updateInfo(Request $request)
    {
        $id = auth()->user()->id;
        $info = employee_information::findOrFail($id);
        $info->email_address = $request->input('email_address');
        $info->contact_number = $request->input('contact_number');
        $info->emergency_name = $request->input('emergency_name');
        $info->emergency_contactnum = $request->input('emergency_contactnum');
        $info->emergency_relationship = $request->input('emergency_relationship');
        $info->save();
        
        return redirect()->back();
    }
}
