<?php

namespace App\Services\Menu\MenuAsset;

use App\Models\Menu\MenuAsset;
use Exception;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CreateService
{
    public function create($request, $id)
    {
        try {

            $path = $request->file('file')->store('menu_assets', 'public');

            $menuAsset = new MenuAsset();

            $menuAsset->menu_id = $id;
            $menuAsset->asset_path = Storage::url($path);

            $menuAsset->save();

            return $menuAsset;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
