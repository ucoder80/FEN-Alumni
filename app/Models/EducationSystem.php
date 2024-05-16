<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationSystem extends Model
{
    use HasFactory;
    protected $table = 'education_system';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
