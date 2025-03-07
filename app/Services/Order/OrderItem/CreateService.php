<?php

namespace App\Services\Order\OrderItem;

use App\Models\Order\OrderItem;
use App\Services\Menu\CheckQuantityService;
use Exception;

class CreateService
{
    public function create($request, $orderId)
    {
        $quantityCheck = new CheckQuantityService();

        try {
            foreach ($request->orders as $item) {

                $quantityStatus = $quantityCheck->checkQuantity($item["id"], $item["quantity"]);

                if ($quantityStatus) {
                    $orderItem = new OrderItem();

                    $orderItem->order_id = $orderId;
                    $orderItem->menu_id = $item["id"];
                    $orderItem->quantity = $item["quantity"];

                    $orderItem->save();
                } else {
                    return $quantityStatus;
                }

            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
