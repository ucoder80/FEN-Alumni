<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'employee_id',
        'customer_id',
        'status',
        'type',
        'onepay',
        'note',
        'type_sale', // 1 ຂາຍຫນ້າຮ້ານ 2 ລູກຄ້າສັ່ງຜ່ານເວບ
        'created_at',
        'updated_at',
    ];
    public function employee()
    {
        return $this->belongsTo('App\Models\User', 'employee_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }
}
