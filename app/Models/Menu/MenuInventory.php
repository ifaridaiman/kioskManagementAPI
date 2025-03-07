<?php

namespace App\Models\Menu;

use App\Models\Order\OrderType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuInventory extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'menu_id',
        'order_type_id',
        'quantity',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function orderType()
    {
        return $this->hasOne(OrderType::class, 'id', 'order_type_id');
    }
}
