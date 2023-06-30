<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use App\Models\employee_information;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user            = new User();
        $user->id        = '1';
        $user->name      = 'Sample User';
        $user->email     = 'sampleuser@email.com';
        $user->password  = bcrypt('password');
        $user->save();

        $userRole           = new UserRole();
        $userRole->user_id  = $user->id;
        $userRole->role_id  = '1';
        $userRole->save();

        $information                          = new employee_information();
        $information->id                      = $user->id;
        $information->profile_picture         = 'Sample Image';
        $information->employee_name           = $user->name;
        $information->email_address           = $user->email;
        $information->contact_number          = '9123456789';
        $information->address2                = 'San Pedro';
        $information->address1                = 'Laguna';
        $information->birth_date              = '2000-01-01';
        $information->birth_place             = 'San Pedro';
        $information->civil_status            = 'Single';
        $information->nationality             = 'Filipino';
        $information->position                = 'Employee';
        $information->tin                     = '123-456-789';
        $information->sss_num                 = '12-3456789-0';
        $information->pagibig_num             = '09-8765432-1';
        $information->philhealth_num          = '01-234567890-1';
        $information->nbi_clearance           = '45-65198431-1';
        $information->gov_id1                 = 'National ID';
        $information->gov_id2                 = 'Passport';
        $information->emergency_name          = 'Jane Doe';
        $information->emergency_contactnum    = '9876543219';
        $information->emergency_relationship  = 'Mother';
        $information->save();
    }
}
