<?php

namespace Modules\Users\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject; 
use Tymon\JWTAuth\Contracts\JWTSubject;


class Users extends Authenticatable implements JWTSubject
{
    use HasFactory,Notifiable;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id', 
        'name', 
        'email', 
        'password',
        'role'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
