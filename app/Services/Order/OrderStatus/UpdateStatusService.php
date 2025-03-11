<?php

namespace App\Services\Order\OrderStatus;

use App\Models\Order\Order;
use App\Models\Order\OrderStatus;
use Exception;

class UpdateStatusService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function updateStatus($request, $id)
    {
        try {
            $order = Order::with(['customer', 'orderType', 'payment.bill', 'statuses'])
                ->find($id);

            $order->status = $request->status;

            $statuses = new OrderStatus([
                'status' => $request->status
            ]);

            $order->save();
            $order->statuses()->save($statuses);

            return $order;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
