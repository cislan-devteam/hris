<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeOff extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'start_date',
        'end_date',
        'leave_type',
        'leave_reason',
        'file_attachment',
        'status'
    ];
}
