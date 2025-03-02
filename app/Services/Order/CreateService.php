<?php

namespace App\Services\Order;

use App\Models\Customer\Customer;
use App\Models\Order\Order;
use Exception;

class CreateService
{
    public function create($request, $customer, $payment)
    {
        try {
            $order = new Order();

            $order->customer_id = $customer->id;
            $order->payment_id = $payment->id;
            $order->order_type_id = $request->order_type_id;

            $order->save();

            return $order;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
