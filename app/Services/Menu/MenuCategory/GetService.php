<?php

namespace App\Services\Menu\MenuCategory;

use App\Models\Menu\MenuCategory;
use Exception;

class GetService
{
    public function get()
    {
        try {
            return MenuCategory::all();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
