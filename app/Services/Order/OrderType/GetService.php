<?php

namespace App\Services\Order\OrderType;

use App\Models\Order\OrderType;
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
            return OrderType::all();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
