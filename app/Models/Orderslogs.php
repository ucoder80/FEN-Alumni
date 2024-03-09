<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderslogs extends Model
{
    use HasFactory;
    protected $table = 'orders_logs';
    protected $fillable = [
        'orders_id',
        'total_paid',
        'type',
        'dated',
        'created_at',
        'updated_at',
    ];
    public function orders()
    {
        return $this->belongsTo('App\Models\Orders', 'orders_id', 'id');
    }
}
