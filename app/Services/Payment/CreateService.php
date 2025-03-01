<?php

namespace App\Services\Payment;

use App\Models\Payment;
use App\Models\PaymentGateway\Bill;
use Carbon\Carbon;
use Exception;

class CreateService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($request, $bill, $collection)
    {
        try {
            $payment = new Payment();

            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->description = $request->description;
            $payment->reference = $request->reference;
            $payment->amount = $request->amount;

            $bill = new Bill([
                'payment_gateway' => $collection->payment_gateway,
                'bill_code' => $bill->id,
                'status' => $bill->state,
                'amount' => $bill->amount / 100,
                'due_to' => Carbon::parse($bill->due_at),
                'url' => $bill->url
            ]);

            $payment->save();
            $payment->bill()->save($bill);

            return $payment;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
