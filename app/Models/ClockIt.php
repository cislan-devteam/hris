<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClockIt extends Model
{
    use HasFactory;

    protected $fillable = ['role_id'];
    protected $casts = [
        'clock_in' => 'datetime',
    ];
}
