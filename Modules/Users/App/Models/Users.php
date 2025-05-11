<?php

namespace Modules\Users\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Users\Database\factories\UsersFactory;

class Users extends Model
{
    use HasFactory;
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
}
