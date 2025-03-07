<?php

namespace App\Services\Menu\MenuCategory;

use App\Models\Menu\MenuCategory;
use Exception;

class CreateService
{
    public function create($request)
    {
        try {
            $menuCategory = new MenuCategory();

            $menuCategory->title = $request->title;
            $menuCategory->description = $request->description;

            $menuCategory->save();

            return $menuCategory;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
