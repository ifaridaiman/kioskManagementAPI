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
            $order->order_type_id = $request->type;
            $order->delivery_method = $request->customerDetails['deliveryMethod'];
            $order->payment_method = $request->customerDetails['paymentMethod'];

            $order->save();

            return $order;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
