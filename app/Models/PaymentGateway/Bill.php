<?php

namespace App\Models\PaymentGateway;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'payment_id',
        'payment_gateway',
        'bill_code',
        'status',
        'amount',
        'due_to',
        'url'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
