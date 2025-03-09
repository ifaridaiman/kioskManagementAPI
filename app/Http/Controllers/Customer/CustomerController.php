<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\Order\CustomerOrderResource;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function get(Request $request)
    {
        $customers = Customer::with('order.orderItem', 'order.status')
            ->where('phone_number', $request->phoneNumber)
            ->get()
            ->groupBy('name');

        // return response()->json(new CustomerOrderResource($custom                                                         ers));
        return response()->json($customers);
    }
}
