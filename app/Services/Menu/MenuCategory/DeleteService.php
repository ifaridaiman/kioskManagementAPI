<?php

namespace App\Services\Menu\MenuCategory;

use App\Models\Menu\MenuCategory;
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
            return MenuCategory::find($id)->delete();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
