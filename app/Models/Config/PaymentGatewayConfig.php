<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentGatewayConfig extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'value'
    ];
}
