<?php

namespace App\Http\Controllers\Menu;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Menu\MenuAssetInterface;
use App\Models\Menu\MenuAsset;

class MenuAssetController extends Controller
{
    public function __construct(
        protected MenuAssetInterface $menuAssetInterface
    ) {
    }

    public function create(Request $request, $id)
    {
        try {
            return $this->menuAssetInterface->create($request, $id);
        } catch (Exception $e) {
            return response()->json(['data' => ['message' => [$e->getMessage()]]], 400);
        }
    }

    public function delete($id)
    {
        try {
            $asset = MenuAsset::findOrFail($id);

            if ($asset) {
                Storage::delete($asset->asset_path);

                $asset->delete();

                return $asset;
            } else {
                return new Exception('Cannot Delete');
            }

        } catch (Exception $e) {
            return response()->json(['data' => ['message' => [$e->getMessage()]]], 400);
        }
    }
}
