<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'code',
        'supplier_id',
        'employee_id',
        'total',
        'status',
        'check_payment',
        'note',
        'created_at',
        'updated_at',
    ];
    public function employee()
    {
        return $this->belongsTo('App\Models\User', 'employee_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\User', 'supplier_id', 'id');
    }
    public function orders_logs()
    {
        return $this->hasMany(Orderslogs::class);
    }
}
