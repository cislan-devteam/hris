<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_information extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_picture',
        'employee_name',
        'email_address',
        'address2',
        'address1',
        'contact_number',
        'birth_date',
        'birth_place',
        'civil_status',
        'nationality',
        'position',

        'tin',
        'sss_num',
        'pagibig_num',
        'philhealth_num',
        'nbi_clearance',
        'gov_id1',
        'gov_id2',

        'emergency_name',
        'emergency_contactnum',
        'emergency_relationship',

        'file_cv',
        'file_tor',
        'file_contract',
        'file_pledge',
        'file_certificate_of_former_employer',
        'img_sketch_of_residence',
        'file_laptop_agreement',
        'file_memo',
        'notice_to_explain',
    ];
}
