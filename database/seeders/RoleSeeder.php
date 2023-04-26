<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Role::create(['role_name' => 'Super Admin']);
        Role::create(['role_name' => 'HR Admin']);
        Role::create(['role_name' => 'IT Admin']);
        Role::create(['role_name' => 'Director']);
        Role::create(['role_name' => 'Client']);
        Role::create(['role_name' => 'Employeer']);
        */

        DB::table('roles')->insert([
            'role_name'=>"Super Admin",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"HR Admin",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"IT Admin",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"Director",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"Client",
        ]);
        DB::table('roles')->insert([
            'role_name'=>"Employee",
        ]);
    }
}
