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

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;

            $customer->save();

            return $customer;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
