<?php

use App\Models\Menu\Menu;

if (!function_exists('calculateTotal')) {
    function calculateTotal($request)
    {
        $total = 0;

        foreach ($request->orders as $order) {
            $menuInventory = Menu::find($order['id']);

            $total += $menuInventory->price * $order['quantity'];
        }

        return $total;
    }
}
