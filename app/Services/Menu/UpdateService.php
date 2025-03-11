<?php

namespace App\Services\Menu;

use App\Models\Menu\Menu;
use Exception;

class UpdateService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function update($request, $id)
    {
        try {

            $menu = Menu::find($id);

            $menu->title = $request->title;
            $menu->description = $request->description;
            $menu->price = $request->price;

            $menu->save();

            return $menu;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
