<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    function student_profiles() {
        return $this->belongsToMany('App\Models\Student', 'student_profile_roles');
    }
}

// class Role extends Eloquent {
//     function student_profiles() {
//     return $this->belongsToMany('App\Models\Student', 'student_profile_roles');
//     }
// }
