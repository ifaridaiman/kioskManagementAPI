<?php

namespace App\Services\PaymentGateway\BillPlz;

use Exception;
use Illuminate\Support\Facades\Http;

class CreateBillService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($request, $collection, $total)
    {
        try {
            $response = Http::withBasicAuth(config('paymentgateway.billplz.secret'), '')
                ->post(config('paymentgateway.billplz.url') . '/v3/bills', [
                    'collection_id' => $collection->secret,
                    'description' => $request->description,
                    'email' => $request->customerDetails['email'],
                    'name' => $request->customerDetails['name'],
                    'amount' => $total * 100,
                    'redirect_url' => config('paymentgateway.billplz.redirect_url'),
                    'callback_url' => config('paymentgateway.billplz.callback_url')
                ]);

            if ($response->successful()) {
                return $response->object();
            } else {
                throw new Exception("BillPlz Create Collection Return Error");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
