<?php

namespace App\Http\Controllers\Menu;

use App\Http\Resources\Menu\MenuResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu\MenuCategoryCollection;
use App\Http\Resources\Menu\MenuCategoryResource;
use App\Interfaces\Menu\MenuInterface;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct(
        protected MenuInterface $menuInterface
    ) {
    }

    public function create(Request $request)
    {
        try {
            return $this->menuInterface->create($request);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function get(Request $request)
    {
        try {
            $menuResource = MenuCategoryResource::collection($this->menuInterface->get($request));

            return $menuResource;
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function find($id)
    {
        try {
            // return $this->menuInterface->find($id);

            return new MenuResource($this->menuInterface->find($id));
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => $e->getMessage()]], 400);
        }
    }
}
