<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaySalary extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'employee_id',
        'years',
        'month',
        'salary',
        'total_salary',
        'status',
        'type',
        'creator_id',
        'note',
        'created_at',
        'updated_at',
    ];
    public function employee()
    {
        return $this->belongsTo('App\Models\User', 'employee_id', 'id');
    }
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }
}
