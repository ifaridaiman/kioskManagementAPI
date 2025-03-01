<?php

namespace App\Interfaces;

interface PaymentInterface
{
    public function create($request, $id);
}
