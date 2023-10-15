<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'project_id',
    ];

    function projects(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
