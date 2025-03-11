<?php

namespace App\Services\Menu;

use App\Models\Menu\Menu;
use Exception;

class DeleteService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function delete($id)
    {
        try {
            $menu = Menu::findOrFail($id)->delete();

            return $menu;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
