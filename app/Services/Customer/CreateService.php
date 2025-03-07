<?php

namespace App\Services\Customer;

use Exception;
use App\Models\Customer\Customer;

class CreateService
{
    public function create($request)
    {
        try {
            $customer = new Customer();

            $customer->name = $request->customerDetails['name'];
            $customer->email = $request->customerDetails['email'];
            $customer->phone_number = $request->customerDetails['phone'];
            $customer->address = $request->customerDetails['address'];

            $customer->save();

            return $customer;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
