<?php

namespace App\Services;

use App\Models\Wishlist;
use App\Repositories\WishlistRepository;
use Exception;
use Illuminate\Support\Collection;
use Log;

/**
 * Class WishlistService
 */
class WishlistService
{
    /**
     * @var WishlistRepository
     */
    private $wishlistRepo;

    /**
     * WishlistService constructor.
     *
     * @param WishlistRepository $wishlistRepo
     */
    public function __construct(WishlistRepository $wishlistRepo)
    {
        $this->wishlistRepo = $wishlistRepo;
    }

    /**
     * @param int $id
     *
     * @return Collection
     */
    public function getWishlist(int $id): Collection
    {
        return $this->wishlistRepo->getWishlist($id);
    }

    /**
     * @param array $array
     *
     * @return bool
     */
    public function storeWishlist(array $array): bool
    {
        Wishlist::create($array);
        return true;
    }

    /**
     * @param int   $id
     * @param array $array
     *
     * @return bool
     */
    public function updateWishlist(int $id, array $array): bool
    {
        $Wishlist = Wishlist::find($id);
        $Wishlist->update($array);
        return true;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function destroyWishlist(int $id): bool
    {
        try {
            Wishlist::where([
                'user_id' => $id,
            ])->delete();
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
