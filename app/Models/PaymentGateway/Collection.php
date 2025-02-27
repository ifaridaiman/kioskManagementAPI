<?php

namespace App\Models\PaymentGateway;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'secret',
        'status'
    ];
}
