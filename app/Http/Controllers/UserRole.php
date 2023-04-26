<?php

namespace App\Http\Controllers;

use App\Models\UserRole as UserRoleModel;
use Illuminate\Http\Request;

class UserRole extends Controller
{
    public function test(){
        $user_role = UserRoleModel::all();

        return dd($user_role);
    }
}
