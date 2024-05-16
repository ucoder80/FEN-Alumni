<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = [
        'id',
        'department_id',
        'name_la',
        'name_en',
        'created_at',
        'updated_at',
    ];
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id', 'id');
    }
}
