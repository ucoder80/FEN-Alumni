<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    use HasFactory;
    protected $table = 'functions';
    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'des',
        'created_at',
        'updated_at',
    ];
}
