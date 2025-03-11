<?php

namespace App\Services\Menu\MenuInventory;

use App\Models\Menu\MenuInventory;
use App\Models\Order\OrderItem;
use Exception;

class StockDeductionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function stockDeduct(OrderItem $orderItem)
    {
        try {

            info($orderItem);

            $menuInventory = MenuInventory::where('menu_id',$orderItem->menu_id)->first();

            $menuInventory->quantity = $menuInventory->quantity - $orderItem->quantity;

            $menuInventory->save();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
