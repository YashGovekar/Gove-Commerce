<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Support\Collection;

class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepo;

    /**
     * OrderService constructor.
     *
     * @param OrderRepository $orderRepo
     */
    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getAllOrders(): Collection
    {
        return $this->orderRepo->getAll();
    }

    public function getCustomerOrders(int $id): Collection
    {
        return $this->orderRepo->getCustomerOrders($id);
    }

    public function getOrder($id): Collection
    {
        return $this->orderRepo->getOrder($id);
    }

    public function storeOrder(array $array): bool
    {
        Order::create($array);
        return true;
    }

    public function updateOrder($id, $array): bool
    {
        $order = Order::find($id);
        $order->update($array);
        return true;
    }
}
