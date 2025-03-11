<?php

namespace App\Repositories\Menu;

use App\Interfaces\Menu\MenuInventoryInterface;
use App\Services\Menu\MenuInventory\CreateService;
use App\Services\Menu\MenuInventory\DeleteService;
use App\Services\Menu\MenuInventory\UpdateService;
use Exception;
use Illuminate\Support\Facades\DB;

class MenuInventoryRepository implements MenuInventoryInterface
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

            $craeteService = new CreateService();

            $create = $craeteService->create($request, $id);

            DB::commit();

            return $create;

        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            $updateService = new UpdateService();

            $update = $updateService->update($request, $id);

            DB::commit();

            return $update;

        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $deleteService = new DeleteService();

            $delete = $deleteService->delete($id);

            DB::commit();

            return $delete;

        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
