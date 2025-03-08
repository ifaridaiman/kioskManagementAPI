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
        'payment_id',
        'payment_method',
        'delivery_method'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function status()
    {
        return $this->hasMany(OrderStatus::class);
    }
}
