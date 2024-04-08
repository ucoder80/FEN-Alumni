<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;
    protected $table = 'sale_detail';
    protected $fillable = [
        'sales_id',
        'products_id',
        'sell_price',
        'stock',
        'subtotal',
        'created_at',
        'updated_at',
    ];
    public function sales()
    {
        return $this->belongsTo('App\Models\Sales', 'sales_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'products_id', 'id');
    }
}
