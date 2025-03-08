<?php

namespace App\Services\Collection;

use Exception;
use App\Models\PaymentGateway\GatewayCollection;

class GetService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getFirst($id)
    {
        try {
            return GatewayCollection::findOrFail($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get()
    {
        try {
            return GatewayCollection::where('status', 'active')->get();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
