<?php

namespace App\Repositories\Menu;

use App\Interfaces\Menu\MenuAssetInterface;
use App\Services\Menu\MenuAsset\CreateService;
use Exception;
use Illuminate\Support\Facades\DB;

class MenuAssetRespository implements MenuAssetInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($request, $id)
    {
        DB::beginTransaction();

        try {
            $createService = new CreateService();

            $create = $createService->create($request, $id);

            DB::commit();

            return $create;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
