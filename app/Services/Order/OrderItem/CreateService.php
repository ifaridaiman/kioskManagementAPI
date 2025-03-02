<?php

namespace App\Services\Order\OrderItem;

use App\Models\Order\OrderItem;
use Exception;

class CreateService
{
    public function create($request, $orderId)
    {
        try {
            foreach ($request->items as $item) {
                $orderItem = new OrderItem();

                $orderItem->order_id = $orderId;
                $orderItem->menu_id = $item["id"];
                $orderItem->quantity = $item["quantity"];

                $orderItem->save();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
