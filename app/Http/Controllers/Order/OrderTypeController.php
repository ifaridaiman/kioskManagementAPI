<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Interfaces\Order\OrderTypeInterface;
use Exception;
use Illuminate\Http\Request;

class OrderTypeController extends Controller
{
    public function __construct(
        protected OrderTypeInterface $orderTypeInterface
    ) {
    }

    public function create(Request $request)
    {
        try {
            return $this->orderTypeInterface->create($request);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }

    public function get()
    {
        try {
            return $this->orderTypeInterface->get();
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->orderTypeInterface->update($request, $id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }
}
