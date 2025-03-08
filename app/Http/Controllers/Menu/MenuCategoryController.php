<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Interfaces\Menu\MenuCategoryInterface;
use Exception;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    public function __construct(
        protected MenuCategoryInterface $menuCategoryInterface
    ) {
    }

    public function create(Request $request)
    {
        try {
            return $this->menuCategoryInterface->create($request);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => [$e->getMessage()]]], 400);
        }
    }

    public function get()
    {
        try {
            return $this->menuCategoryInterface->get();
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => [$e->getMessage()]]], 400);
        }
    }
}
