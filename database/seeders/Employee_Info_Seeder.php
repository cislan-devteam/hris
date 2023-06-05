<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee_information;


class Employee_Info_Seeder extends Seeder
{
    public function run()
    {
        $information = new employee_information();
        $information->id = '1';
        $information->profile_picture = 'Sample Image';
        $information->employee_name = 'John Doe';
        $information->email_address = 'johndoe@email.com';
        $information->contact_number = '09123456789';
        $information->address2 = 'San Pedro';
        $information->address1 = 'Laguna';
        $information->birth_date = '2000-01-01';
        $information->birth_place = 'San Pedro';
        $information->civil_status = 'Single';
        $information->nationality = 'Filipino';
        $information->position = 'Employee';
        $information->tin = '123-456-789';
        $information->sss_num = '12-3456789-0';
        $information->pagibig_num = '09-8765432-1';
        $information->philhealth_num = '01-234567890-1';
        $information->nbi_clearance = '45-65198431-1';
        $information->gov_id1 = 'National ID';
        $information->gov_id2 = 'Passport';
        $information->emergency_name = 'Jane Doe';
        $information->emergency_contactnum = '123456';
        $information->emergency_relationship = 'Mother';
        $information->save();
    }
}
