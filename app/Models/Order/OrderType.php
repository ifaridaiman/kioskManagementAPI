<?php

namespace App\Models\Order;

use App\Models\Menu\MenuInventory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderType extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'description'
    ];

    public function menuInventory()
    {
        return $this->belongsTo(MenuInventory::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function orderTypeRule()
    {
        return $this->hasMany(OrderTypeRule::class);
    }
}
