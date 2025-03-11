<?php

namespace App\Services\Menu\MenuInventory;

use App\Models\Menu\MenuInventory;
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

            $menuInventory = MenuInventory::findOrFail($id)->delete();

            return $menuInventory;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
