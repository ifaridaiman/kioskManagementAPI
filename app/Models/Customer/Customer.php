<?php

namespace App\Models\Customer;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
