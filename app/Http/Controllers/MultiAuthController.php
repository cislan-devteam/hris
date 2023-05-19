<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthController extends Controller
{

    public function index(){
        $userRole = UserRole::all();

        return view('layouts.master-template', compact('userRole'));
    }

    public function authLogout(){

        Auth::logout(); // Logs out currently authenticated user
        return view('auth.login');
    }
}
