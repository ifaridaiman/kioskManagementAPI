<?php

namespace App\Interfaces;

interface PaymentInterface
{
    public function create($request, $id);

    public function redirectUrl($request);

    public function callbackUrl($request);
}
