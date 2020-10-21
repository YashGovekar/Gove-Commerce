<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Collection;

class OrderRepository
{
    public function getAll(): Collection
    {
        return Order::all();
    }

    public function getCustomerOrders(int $id): Collection
    {
        return Order::where('user_id', $id)->get();
    }

    public function getOrder($id): Collection
    {
        return Order::find($id);
    }
}
