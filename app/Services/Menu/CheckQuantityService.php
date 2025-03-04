<?php

namespace App\Services\Menu;

use App\Models\Menu\MenuInventory;
use Exception;

class CheckQuantityService
{
    public function checkQuantity($menuId, $orderQuantity)
    {
        try {
            $currentQuantity = MenuInventory::where('menu_id', $menuId)->first();

            if ($currentQuantity) {
                if ($currentQuantity >= $orderQuantity) {
                    return true;
                } else {
                    throw new Exception('Quantity for ' . $currentQuantity->menu->title . ' has exceed limit');
                }
            } else {
                throw new Exception('Menu not found');
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
}
