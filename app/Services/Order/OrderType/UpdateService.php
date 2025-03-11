<?php

namespace App\Services\Order\OrderType;

use App\Models\Order\OrderType;
use Exception;

class UpdateService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function update($request, $id)
    {
        try {
            $orderType = OrderType::find($id);

            $orderType->name = $request->name;
            $orderType->description = $request->description;

            $orderType->save();

            return $orderType;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
