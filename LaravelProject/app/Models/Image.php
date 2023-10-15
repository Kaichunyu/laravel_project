<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'project_id',
    ];

    function projects(){
        return $this->belongsTo(Project::class, 'project_id');
    }
}
