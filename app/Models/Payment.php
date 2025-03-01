<?php

namespace App\Models;

use App\Models\PaymentGateway\Bill;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasOne(Bill::class);
    }
}
