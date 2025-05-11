<?php

namespace Modules\Products\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    use HasFactory,Notifiable,HasUuids;

    protected $table = 'products';
    public $timestamps = true;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id', 'category_id', 'name', 'description', 'price', 'stock'
    ];
}
