<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionAvailable extends Model
{
    use HasFactory;
    protected $table = 'function_availables';
    protected $fillable = [
        'id',
        'role_id',
        'function_id',
        'created_at',
        'updated_at',
    ];
    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
    public function function()
    {
        return $this->belongsTo('App\Models\Functions', 'function_id', 'id');
    }
}
