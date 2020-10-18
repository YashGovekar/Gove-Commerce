<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    /**
     * @var CartService
     */
    private $cartSvc;

    /**
     * CartController constructor.
     *
     * @param CartService $cartSvc
     */
    public function __construct(CartService $cartSvc)
    {
        $this->cartSvc = $cartSvc;
    }

    public function index(): Response
    {
        return Inertia::render('Cart/Index');
    }

    public function store(Request $request): Response
    {
        $this->cartSvc->storeCart($request->all());
        return Inertia::render('Cart/Index');
    }

    public function update($id, Request $request): Response
    {
        $this->cartSvc->updateCart($id, $request->all());
        return Inertia::render('Cart/Index');
    }
}
