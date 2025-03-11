<?php

namespace App\Repositories\Customer;

use App\Interfaces\Customer\CustomerInterface;
use App\Services\Customer\GetService;
use Exception;

class CustomerRepository implements CustomerInterface
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
            $getService = new GetService();

            return $getService->get($request);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
