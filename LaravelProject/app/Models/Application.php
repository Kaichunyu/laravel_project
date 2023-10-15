<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'justification', 
        'user_id', 
        'project_id',
    ];

    function projects(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
