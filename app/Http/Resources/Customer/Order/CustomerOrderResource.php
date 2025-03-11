<?php

namespace App\Http\Resources\Customer\Order;

use App\Http\Resources\Customer\CustomerResource;
use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            // 'customer' => new CustomerResource($this),
            'orders' => new OrderResource($this->order)
        ];
    }
}
