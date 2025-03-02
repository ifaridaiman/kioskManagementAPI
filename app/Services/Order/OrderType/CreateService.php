<?php

namespace App\Services\Order\OrderType;

use App\Models\Order\OrderType;
use Exception;

class CreateService
{
    public function create($request)
    {
        try {
            $orderType = new OrderType();

            $orderType->name = $request->name;
            $orderType->description = $request->description;

            $orderType->save();

            return $orderType;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
