<?php

namespace App\Services;

use App\Models\Cart;
use App\Repositories\CartRepository;
use Exception;
use Illuminate\Support\Collection;
use Log;

/**
 * Class CartService
 */
class CartService
{
    /**
     * @var CartRepository
     */
    private $cartRepo;

    /**
     * CartService constructor.
     */
    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    /**
     * @param int $id
     *
     * @return Collection
     */
    public function getCart(int $id): Collection
    {
        return $this->cartRepo->getCart($id);
    }

    /**
     * @param array $array
     *
     * @return bool
     */
    public function storeCart(array $array): bool
    {
        Cart::create($array);
        return true;
    }

    /**
     * @param int   $id
     * @param array $array
     *
     * @return bool
     */
    public function updateCart(int $id, array $array): bool
    {
        $cart = Cart::find($id);
        $cart->update($array);
        return true;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function destroyCart(int $id): bool
    {
        try {
            Cart::where([
                'user_id' => $id,
            ])->delete();
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
