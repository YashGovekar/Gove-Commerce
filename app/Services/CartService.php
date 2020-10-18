<?php

namespace App\Services;

use App\Models\Cart;

class CartService
{
    public function storeCart(array $array): bool
    {
        Cart::create($array);
        return true;
    }

    public function updateCart($id, $array): bool
    {
        $cart = Cart::find($id);
        $cart->update($array);
        return true;
    }
}
