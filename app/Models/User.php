<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'code',
        'roles_id',
        'village_id',
        'district_id',
        'province_id',
        'salary_id',
        'position_id',
        'image',
        'nationality',
        'religion',
        'name_lastname',
        'phone',
        'email',
        'gender',
        'birtday_date',
        'status',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    public function roles()
    {
        return $this->belongsTo('App\Models\Role', 'roles_id', 'id');
    }
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
    public function salary()
    {
        return $this->belongsTo('App\Models\Salary', 'salary_id', 'id');
    }
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
