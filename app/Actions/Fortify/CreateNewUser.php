<?php declare(strict_types=1);

/*
*
* Author: Dean Voltaire Tumangan
* Email: dv.tumangan@gmail.com
*
*/

namespace App\Actions\Fortify;


use App\Models\User;
use App\Models\UserRole;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $users =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
        ]);

        $userRole = new UserRole();

        $userRole->user_id = $users->id;
        $userRole->role_id = $input['role_id'];

        $userRole->save();




    /**
     * Create a personal team for the user.
     */

    //protected function createTeam(User $user): void
    //{
    //    $user->ownedTeams()->save(Team::forceCreate([
    //        'user_id' => $user->id,
    //        'name' => explode(' ', $user->name, 2)[0]."'s Team",
    //        'personal_team' => true,
    //    ]));
    //}
    }

}
