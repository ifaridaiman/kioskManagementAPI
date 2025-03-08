<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Customer\CustomerResource;
use App\Http\Resources\Payment\PaymentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'payment_method' => $this->payment_method,
            'delivery_method' => $this->delivery_method,
            'customer' => new CustomerResource($this->customer),
            'order_type' => new OrderTypeResource($this->orderType),
            'payment' => new PaymentResource($this->payment),
            'statuses' => OrderStatusResource::collection($this->status)
        ];
    }
}
