<?php

namespace App\Services\Menu\MenuInventory;

use App\Models\Menu\MenuInventory;
use Exception;

class CreateService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($request, $id)
    {
        try {
            $menuInventory = new MenuInventory();

            $menuInventory->menu_id = $id;
            $menuInventory->order_type_id = $request->order_type_id;
            $menuInventory->quantity = $request->quantity;
            $menuInventory->start_date = $request->start_date;
            $menuInventory->end_date = $request->end_date;
            $menuInventory->start_time = $request->start_time;
            $menuInventory->end_time = $request->end_time;

            $menuInventory->save();

            return $menuInventory;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
