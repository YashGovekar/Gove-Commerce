<?php

namespace App\Http\Controllers\Frontend;

use App\Services\OrderService;
use Inertia\Inertia;
use Inertia\Response;

class OrderController
{
    /**
     * @var OrderService
     */
    private $orderSvc;

    /**
     * OrderController constructor.
     *
     * @param OrderService $orderSvc
     */
    public function __construct(OrderService $orderSvc)
    {
        $this->orderSvc = $orderSvc;
    }

    public function index(): Response
    {
        $orders = $this->orderSvc->getCustomerOrders($id = 1);
        return Inertia::render('Orders/Index', [
            'orders' => $orders,
        ]);
    }

    public function show($id): Response
    {
        $order = $this->orderSvc->getOrder($id);
        return Inertia::render('Orders/Order', [
            'order' => $order,
        ]);
    }
}
