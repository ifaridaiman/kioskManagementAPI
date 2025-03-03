<?php

namespace App\Services\Menu;

use Exception;
use App\Models\Menu\Menu;
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
            return Menu::with('menuInventory')
            ->when($request->has('orderType'), function (Builder $query) use ($request) {
                $query->whereHas('menuInventory', function (Builder $menuInventory) use ($request) {
                    $menuInventory->where('order_type_id', $request->orderType);
                });
            })
                ->get();

        } catch (Exception $e) {
            throw $e;
        }
    }
}
