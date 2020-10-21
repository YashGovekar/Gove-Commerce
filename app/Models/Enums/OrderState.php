<?php

namespace App\Models\Enums;

use BenSampo\Enum\Enum;

final class OrderState extends Enum
{
    const ORDER_RECEIVED = 0; // Order Received By System.
    const ORDER_PROCESSING = 1; // Order is being processed.
    const ORDER_DISPATCHED = 2; // Order has been dispatched.
    const ORDER_CANCELLED = 3; // Order cancelled.
}
