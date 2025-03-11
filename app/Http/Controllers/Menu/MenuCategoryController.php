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
            return response()->json(['data' => ['message' => [$e->getMessage()]]], 400);
        }
    }

    public function get()
    {
        try {
            return $this->menuCategoryInterface->get();
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => [$e->getMessage()]]], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->menuCategoryInterface->update($request, $id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }

    public function delete($id)
    {
        try {
            return $this->menuCategoryInterface->delete($id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }
}
