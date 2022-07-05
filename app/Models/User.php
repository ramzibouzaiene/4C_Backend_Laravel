<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Models\Role;


class User extends \TCG\Voyager\Models\User 
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'name',
        'role_id',
        'email',
        'password',
        'lastname',
        'cin',
        'tel',
        'adresse',
        'date_nes',
        'linkedin',
        'facebook', 
        'instagram',
        'github',
        'grade',
        'specialite',
        'statut',
        'avatar',
    ];

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole(){
        return $this->belongsTo('App\Role' , 'role_id' ,'id');
    }

    public function userable()
    {
        return $this->morphTo();
    }
}
