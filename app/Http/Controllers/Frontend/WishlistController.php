<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use App\Services\WishlistService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WishlistController extends Controller
{
    /**
     * @var WishlistService
     */
    private $wishlistSvc;

    /**
     * WishlistController constructor.
     *
     * @param WishlistService $wishlistSvc
     */
    public function __construct(WishlistService $wishlistSvc)
    {
        $this->wishlistSvc = $wishlistSvc;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Wishlist/Index');
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request): Response
    {
        $this->wishlistSvc->storeWishlist($request->all());
        return Inertia::render('Wishlist/Index');
    }

    /**
     * @param $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request): Response
    {
        $this->wishlistSvc->updateWishlist($id, $request->all());
        return Inertia::render('Wishlist/Index');
    }

    /**
     * @param $id
     *
     * @return Response
     */
    public function destroy($id): Response
    {
        $this->wishlistSvc->destroyWishlist($id);
        return Inertia::render('Wishlist/Index');
    }
}
