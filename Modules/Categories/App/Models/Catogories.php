<?php

namespace Modules\Catogories\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Catogories extends Model
{
    use HasFactory,Notifiable,HasUuids;

    protected $table = 'categories';
    public $timestamps = true;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id', 
        'name', 
        'description,'
    ];
}
