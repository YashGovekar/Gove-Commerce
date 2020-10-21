<?php

namespace App\Http\Controllers\Admin;

use App\Services\OrderService;
use Inertia\Inertia;
use Inertia\Response;

class OrderController
{
    /**
     * @var OrderService
     */
    private $orderSvc;

    public function __construct(OrderService $orderSvc)
    {
        $this->orderSvc = $orderSvc;
    }

    public function index(): Response
    {
        return Inertia::render('Orders/Admin/Index');
    }

    public function show($id): Response
    {
        $order = $this->orderSvc->getOrder($id);
        return Inertia::render('Orders/Admin/Order', [
            'order' => $order,
        ]);
    }
}
