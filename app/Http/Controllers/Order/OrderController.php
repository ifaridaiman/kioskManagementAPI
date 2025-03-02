<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Interfaces\Order\OrderInterface;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        protected OrderInterface $orderInterface
    ) {
    }

    public function create(Request $request, $id)
    {
        try {
            return $this->orderInterface->create($request, $id);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
