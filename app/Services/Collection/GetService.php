<?php

namespace App\Services\Collection;

use App\Models\PaymentGateway\Collection;
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

    public function getFirst($id)
    {
        try {
            return Collection::find($id);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
