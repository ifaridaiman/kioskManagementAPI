<?php

namespace App\Services\Payment;

use Exception;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\PaymentGateway\GatewayBill;

class CreateService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($request, $bill, $collection, $total)
    {
        try {
            $payment = new Payment();

            $payment->name = $request->customerDetails['name'];
            $payment->email = $request->customerDetails['email'];
            $payment->description = $request->description;
            $payment->amount = $total;

            $bill = new GatewayBill([
                'payment_gateway' => $collection->payment_gateway,
                'bill_code' => $bill->id,
                'status' => $bill->state,
                'amount' => $total,
                'due_to' => Carbon::parse($bill->due_at),
                'url' => $bill->url,
                'success_url' => $request->successPath,
                'failed_url' => $request->failedPath
            ]);

            $payment->save();
            $payment->bill()->save($bill);

            return $payment->load('bill');

        } catch (Exception $e) {
            throw $e;
        }
    }
}
