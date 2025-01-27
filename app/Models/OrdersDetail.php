<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;
    protected $table = 'orders_detail';
    protected $fillable = [
        'product_id',
        'orders_id',
        'buy_price',
        'stock',
        'subtotal',
        'created_at',
        'updated_at',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
    public function orders()
    {
        return $this->belongsTo('App\Models\Orders', 'orders_id', 'id');
    }
}
