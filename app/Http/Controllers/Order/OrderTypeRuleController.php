<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Interfaces\Order\OrderTypeRuleInterface;
use Exception;
use Illuminate\Http\Request;

class OrderTypeRuleController extends Controller
{
    public function __construct(
        protected OrderTypeRuleInterface $orderTypeRuleInterface
    ) {
    }

    public function create(Request $request)
    {
        try {
            return $this->orderTypeRuleInterface->create($request);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
