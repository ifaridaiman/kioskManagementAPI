<?php

use App\Models\Order\OrderStatus;

if (!function_exists('updateStatus')) {
    function updateStatus($id, $status)
    {
        $status = new OrderStatus();

        $status->order_id = $id;
        $status->status = $status;

        $status->save();
    }
}
