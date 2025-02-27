<?php

namespace App\Services\Collection;

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

        $collection->save();

        return $collection;
    }
}
