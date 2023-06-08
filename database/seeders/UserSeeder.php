<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->id = '1';
        $user->name = 'Sample User';
        $user->email = 'sampleuser@email.com';
        $user->password = bcrypt('password');
        $user->save();

        $userRole = new UserRole();
        $userRole->user_id = $user->id;
        $userRole->role_id = '1';
        $userRole->save();
    }
}
