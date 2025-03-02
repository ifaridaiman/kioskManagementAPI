<?php

namespace App\Services\Order\OrderStatus;

use App\Models\Order\OrderStatus;
use Exception;

class CreateService
{
    public function create($order)
    {
        try {
            $status = new OrderStatus();

            $status->order_id = $order->id;
            $status->status = 'Created';

            $status->save();

            return $status;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
