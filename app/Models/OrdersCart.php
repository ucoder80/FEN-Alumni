<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersCart extends Model
{
    use HasFactory;
    protected $table = 'orders_cart';
    protected $fillable =
        ['id',
        'creator_id',
        'product_id',
        'name',
        'price',
        'qty',
        'subtotal',
        'created_at',
        'updated_at'];
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
