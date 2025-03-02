<?php

namespace App\Models\PaymentGateway;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GatewayCollection extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'secret',
        'payment_gateway',
        'collection_key',
        'status'
    ];
}
