<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'payment_gateway' => $this->bill->payment_gateway,
            'status' => $this->bill->status,
            'paid_at' => $this->bill->paid_at
        ];
    }
}
