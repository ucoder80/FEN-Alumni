<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeExpend extends Model
{
    use HasFactory;
    protected $table = 'income_expends';
    protected $fillable = [
        'id',
        'name',
        'total_price',
        'type', //1 = ລາຍຮັບ 2 = ລາຍຈ່າຍ
        'dated',
        'created_at',
        'updated_at',
    ];
}
