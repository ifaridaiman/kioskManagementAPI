<?php

namespace App\Interfaces\Order;

interface OrderTypeInterface
{
    public function create($request);

    public function get();
}
