<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'code',
        'product_type_id',
        'name',
        'image',
        'stock',
        'buy_price',
        'sell_price',
        'select_color',
        'status',
        'note',
        'created_at',
        'updated_at',
    ];
    public function product_type()
    {
        return $this->belongsTo('App\Models\ProductType', 'product_type_id', 'id');
    }
}
