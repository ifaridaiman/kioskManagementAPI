<?php

namespace App\Services\Menu;

use Exception;
use App\Models\Menu\Menu;
use App\Models\Menu\MenuCategory;
use Illuminate\Database\Eloquent\Builder;

class GetService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function get($request)
    {
        try {
            return MenuCategory::with('menus.menuInventory.orderType')
                ->when($request->has('orderType'), function (Builder $query) use ($request) {
                    $query->whereHas('menus.menuInventory', function (Builder $menuInventory) use ($request) {
                        $menuInventory->where('order_type_id', $request->orderType);
                    });
                })
                ->get();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
