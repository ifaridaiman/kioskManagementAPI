<?php

namespace App\Models;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentGateway\GatewayBill;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Payment extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'description',
        'reference'
    ];

    public function bill()
    {
        return $this->hasOne(GatewayBill::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
