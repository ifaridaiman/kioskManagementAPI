<?php

namespace App\Services\Menu;

use App\Models\Menu\Menu;
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

    public function create($request)
    {
        try {
            $menu = new Menu();

            $menu->title = $request->title;
            $menu->description = $request->description;
            $menu->price = $request->price;

            $menuInventory = new MenuInventory([
                'quantity' => $request->quantity,
                'order_type_id' => $request->order_type_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);

            $menu->save();
            $menu->menuInventory()->save($menuInventory);

            return $menu;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
