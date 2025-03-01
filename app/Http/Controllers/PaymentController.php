<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentInterface;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentInterface $paymentInterface
    ) {

    }

    public function create(Request $request, $id)
    {
        try {
            return $this->paymentInterface->create($request, $id);
        } catch (Exception $e) {
            return response()->json(['message' => $e]);
        }
    }
}
