<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\Order\CustomerOrderResource;
use App\Interfaces\Customer\CustomerInterface;
use App\Models\Customer\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerInterface $customerInterface
    ) {
    }

    public function get(Request $request)
    {
        try {
            return response()->json(CustomerOrderResource::collection($this->customerInterface->get($request))->groupBy('name'));
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }
}
