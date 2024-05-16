<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationYear extends Model
{
    use HasFactory;
    protected $table = 'education_year';
    protected $fillable = [
        'id',
        'start_year',
        'end_year',
        'genderation',
        'created_at',
        'updated_at',
    ];
}
