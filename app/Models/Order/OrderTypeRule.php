<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderTypeRule extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'order_type_id',
        'rule_type',
        'close_time',
    ];
}
