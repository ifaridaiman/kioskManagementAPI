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
            info($e);
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }

    public function list(Request $request)
    {
        try {
            return $this->orderInterface->get($request);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }
}
