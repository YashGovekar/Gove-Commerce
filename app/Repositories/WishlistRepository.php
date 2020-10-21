<?php

namespace App\Repositories;

use App\Models\Wishlist;
use Illuminate\Support\Collection;

class WishlistRepository
{
    public function getWishlist(int $id): Collection
    {
        return Wishlist::where('user_id', $id)->get();
    }
}
