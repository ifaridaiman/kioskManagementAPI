<?php

namespace App\Services\Payment;

use App\Services\Menu\MenuInventory\StockDeductionService;
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

                updateStatus($bill->payment->order->id, 'Payment Failed');

                throw new Exception('Payment Failed.');
            }

            if ($bill) {
                $stockDeduct = new StockDeductionService();

                updateStatus($bill->payment->order->id, 'Payment Success');

                $bill->status = 'paid';
                $bill->paid_at = Carbon::parse($request['billplz']['paid_at']);

                $bill->save();

                foreach ($bill->payment->order->orderItem as $orderItem) {
                    $stockDeduct->stockDeduct($orderItem);
                }

                return $bill;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}
