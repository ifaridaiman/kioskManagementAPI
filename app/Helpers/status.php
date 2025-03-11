<?php

use App\Models\Order\OrderStatus;

if (!function_exists('updateStatus')) {
    function updateStatus($id, $currentStatus)
    {
        try {
            $order = new OrderStatus();

            $order->order_id = $id;
            $order->status = $currentStatus;

            $order->save();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
