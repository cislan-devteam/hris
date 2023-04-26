<?php declare(strict_types=1);

/*
*
* Author: Dean Voltaire Tumangan
* Email: dv.tumangan@gmail.com
*
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id'
    ];
}
