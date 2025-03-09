<?php

namespace App\Http\Controllers;

use Exception;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Interfaces\PaymentInterface;

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
            return response()->json(['message' => $e], 400);
        }
    }

    public function redirectUrl(Request $request)
    {
        try {
            $redirect = $this->paymentInterface->redirectUrl($request);

            // $agent = new Agent();

            return redirect()->away(config('mobileapplication.mobile_application.success') . '/' . $redirect->id);

        } catch (Exception $e) {
            return redirect()->away(config('mobileapplication.mobile_application.failed'));
            // return response()->json(['message' => $e], 400);
        }
    }

    public function callbackUrl(Request $request)
    {
        try {
            return $this->paymentInterface->callbackUrl($request);
        } catch (Exception $e) {
            return response()->json(['message' => $e], 400);
        }
    }

    public function get()
    {
        try {
            return $this->paymentInterface->get();
        } catch (Exception $e) {
            return response()->json(['message' => $e], 400);
        }
    }
}
