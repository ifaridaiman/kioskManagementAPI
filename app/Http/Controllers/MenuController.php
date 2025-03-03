<?php

namespace App\Http\Controllers;

use App\Interfaces\MenuInterface;
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
            return $this->menuInterface->get($request);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
