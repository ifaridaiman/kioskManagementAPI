<?php

namespace App\Services\Collection;

use Illuminate\Support\Str;
use App\Models\PaymentGateway\Collection;

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
        $collection = new Collection;

        $collection->name = $data->title;
        $collection->secret = $data->id;
        $collection->payment_gateway = 'BillPlz';
        $collection->collection_key = Str::uuid();

        $collection->save();

        return $collection;
    }
}
