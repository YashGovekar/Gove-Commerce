<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cart
 *
 * @mixin Eloquent
 */
class Cart extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasOne('App\Models\Product');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
