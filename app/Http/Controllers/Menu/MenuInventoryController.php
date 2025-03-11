<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Interfaces\Menu\MenuInventoryInterface;
use Exception;
use Illuminate\Http\Request;

class MenuInventoryController extends Controller
{
    public function __construct(
        protected MenuInventoryInterface $menuInventoryInterface
    ) {
    }

    public function create(Request $request, $id)
    {
        try {
            return $this->menuInventoryInterface->create($request, $id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->menuInventoryInterface->update($request, $id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }

    public function delete($id)
    {
        try {
            return $this->menuInventoryInterface->delete($id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }
}
