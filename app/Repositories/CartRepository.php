<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Collection;

/**
 * Class CartRepository
 */
class CartRepository
{
    /**
     * @param int $id
     *
     * @return Collection
     */
    public function getCart(int $id): Collection
    {
        return Cart::where('user_id', $id)->get();
    }
}
