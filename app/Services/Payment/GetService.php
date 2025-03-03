<?php

namespace App\Services\Payment;

use App\Models\PaymentGateway\GatewayCollection;
use Exception;

class GetService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function get()
    {
        try {
            return GatewayCollection::get();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
