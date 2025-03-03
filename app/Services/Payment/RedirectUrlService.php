<?php

namespace App\Services\Payment;

use Exception;
use Carbon\Carbon;
use App\Models\PaymentGateway\GatewayBill;

class RedirectUrlService
{
    public function redirectUrl($request)
    {
        try {

            $bill = GatewayBill::where('bill_code', $request['billplz']['id'])->first();

            if (!$bill) {
                throw new Exception('Billcode not found.');
            }

            if (!$request['billplz']['paid']) {
                throw new Exception('Payment Failed.');
            }

            if ($bill) {
                $bill->status = 'paid';
                $bill->paid_at = Carbon::parse($request['billplz']['paid_at']);

                $bill->save();

                return $bill;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}
