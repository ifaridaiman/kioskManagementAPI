<?php

namespace App\Services\Order\OrderTypeRule;

use App\Models\Order\OrderTypeRule;
use Exception;

class CreateService
{
    public function create($request)
    {
        try {
            $orderTypeRule = new OrderTypeRule();

            $orderTypeRule->order_type_id = $request->order_type_id;
            $orderTypeRule->rule_type = $request->rule_type;
            $orderTypeRule->close_time = $request->close_time;
            $orderTypeRule->close_date = $request->close_date;

            $orderTypeRule->save();

            return $orderTypeRule;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
