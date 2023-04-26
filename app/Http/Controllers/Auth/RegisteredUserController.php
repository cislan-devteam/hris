<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;

class RegisteredUserController
    extends \Laravel\Fortify\Http\Controllers\RegisteredUserController
{

    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse
    {
        event(new Registered($user = $creator->create($request->all())));
        return app(RegisterResponse::class);

    }


}
