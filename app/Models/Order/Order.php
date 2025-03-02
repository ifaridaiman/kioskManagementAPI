<?php

namespace App\Models\Order;

use App\Models\Customer\Customer;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'customer_id',
        'order_type_id',
        'payment_id'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function orderType()
    {
        return $this->hasOne(OrderType::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
