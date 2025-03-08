<?php

namespace App\Interfaces\PaymentGateway\BillPlz;

interface CollectionInterface
{
    public function create($request);

    public function get();
}
