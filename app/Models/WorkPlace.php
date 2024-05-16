<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    use HasFactory;
    protected $table = 'work_place';
    protected $fillable = [
        'id',
        'name',
        'position',
        'sectors',
        'village_id',
        'district_id',
        'province_id',
        'created_at',
        'updated_at',
    ];
    public function village()
    {
        return $this->belongsTo('App\Models\Village', 'village_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_id', 'id');
    }
}
