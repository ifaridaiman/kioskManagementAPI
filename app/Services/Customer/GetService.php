<?php

namespace App\Services\Customer;

use Exception;
use App\Models\Customer\Customer;
use App\Http\Resources\Customer\Order\CustomerOrderResource;

class GetService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function get($request)
    {
        try {
            if ($request->has('phoneNumber')) {
                $customers = Customer::with('order.orderItem', 'order.status')
                    ->where('phone_number', $request->phoneNumber)
                    ->get();

                return $customers;
            } else {
                throw new Exception('Phone Number is required');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
