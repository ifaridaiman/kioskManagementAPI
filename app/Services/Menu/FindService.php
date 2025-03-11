<?php

namespace App\Services\Menu;

use App\Models\Menu\Menu;
use Exception;

class FindService
{
    public function find($id)
    {
        try {
            return Menu::with(['menuInventory', 'menuAsset'])->find($id);
        } catch (Exception $e) {
            return $e;
        }
    }
}
