<?php

namespace App\Interfaces\Order;

interface OrderInterface
{
    public function create($request, $id);

    public function get($request);
}
