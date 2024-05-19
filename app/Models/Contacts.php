<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'id',
        'name',
        'email',
        'subject',
        'message',
        'created_at',
        'updated_at',
    ];
}
