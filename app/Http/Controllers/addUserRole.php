<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;



class addUserRole extends Controller
{

    public function addUser(Request $request){


        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return redirect()->back()->with('userAddMsg','User Added Successfully');
    }
}
