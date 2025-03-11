<?php

namespace App\Services\Menu\MenuCategory;

use App\Models\Menu\MenuCategory;
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
            $menuCategory = MenuCategory::find($id);

            $menuCategory->title = $request->title;
            $menuCategory->description = $request->description;

            $menuCategory->save();

            return $menuCategory;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
