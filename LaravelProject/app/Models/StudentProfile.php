<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_point_average',
        'user_id',
    ];


    function roles() {
        return $this->belongsToMany('App\Models\Role', 'student_profile_roles');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

// class Student_Profile extends Eloquent 
// {
//     function roles() {
//     return $this->belongsToMany('App\Models\Role', 'student_profile_roles');
//     }
// }
