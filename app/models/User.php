<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\UserACLTrait;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, UserACLTrait, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tenant_id', 'profile_id', 'image', 'active', 'salary', 'phone', ''
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

}
