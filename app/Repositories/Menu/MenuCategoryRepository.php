<?php

namespace App\Repositories\Menu;

use App\Interfaces\Menu\MenuCategoryInterface;
use App\Services\Menu\MenuCategory\CreateService;
use App\Services\Menu\MenuCategory\GetService;
use Exception;

class MenuCategoryRepository implements MenuCategoryInterface
{
    public function create($request)
    {
        try {
            $createService = new CreateService;

            return $createService->create($request);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get()
    {
        try {
            $getService = new GetService();

            return $getService->get();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
