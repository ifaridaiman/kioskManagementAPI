<?php

namespace App\Services\PaymentGateway\BillPlz;

use Exception;
use Illuminate\Support\Facades\Http;

class CreateCollectionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($title)
    {
        try {
            $response = Http::withBasicAuth(config('paymentgateway.billplz.secret'), '')
                ->asForm()
                ->post(config('paymentgateway.billplz.url') . '/v4/collections', [
                    'title' => $title
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
