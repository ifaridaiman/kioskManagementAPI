<?php

namespace App\Services\Order;

use App\Models\Order\Order;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class GetService
{
    public function get($request)
    {
        try {
            return Order::with(['customer', 'orderType', 'payment.bill', 'statuses'])
                ->when($request->has('phoneNumber'), function (Builder $query) use ($request) {
                    $query->whereHas('customer', function (Builder $customer) use ($request) {
                        $customer->where('phone_number', $request->phoneNumber);
                    });
                })
                ->get();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
