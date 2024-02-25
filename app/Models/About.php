<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';
    protected $fillable = [
        'id',
        'name_la',
        'name_en',
        'phone',
        'address',
        'latitude',
        'longitude',
        'note',
        'created_at',
        'updated_at',
    ];
    public function village()
    {
        return $this->belongsTo('App\Models\Village','village_id','id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Province','province_id','id');
    }
}
