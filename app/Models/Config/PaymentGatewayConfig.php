<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentGatewayConfig extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'type',
        'value'
    ];
}
