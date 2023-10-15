<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'number_of_student_needed', 
        'offering_trimester', 
        'offering_year', 
        'user_id',
    ];

    function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function application() {
        return $this->hasMany(Application::class);
    }

    function files() {
        return $this->hasMany(File::class);
    }

    function images() {
        return $this->hasMany(Image::class);
    }
}
