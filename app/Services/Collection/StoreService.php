<?php

namespace App\Services\Collection;

use Exception;
use Illuminate\Support\Str;
use App\Models\PaymentGateway\GatewayCollection;

class StoreService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store($data)
    {
        try {
            $collection = new GatewayCollection;

            $collection->name = $data->title;
            $collection->secret = $data->id;
            $collection->payment_gateway = 'BillPlz';
            $collection->collection_key = Str::uuid();

            $collection->save();

            return $collection;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function storeCod()
    {
        try {
            $collection = new GatewayCollection;

            $collection->name = "Cash on Delivery";
            $collection->secret = Str::random(15);
            $collection->payment_gateway = 'COD';
            $collection->collection_key = Str::uuid();

            $collection->save();

            return $collection;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
