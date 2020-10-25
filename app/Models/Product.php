<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'ratings', 'created_at', 'updated_at',
    ];

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function brand()
    {
        return $this->hasOne('App\Models\Brand');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
}
