<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'items' => 'array',
    ];
}
