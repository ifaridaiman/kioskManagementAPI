<?php

namespace App\Repositories\Menu;

use App\Services\Menu\MenuCategory\DeleteService;
use App\Services\Menu\MenuCategory\UpdateService;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Menu\MenuCategoryInterface;
use App\Services\Menu\MenuCategory\GetService;
use App\Services\Menu\MenuCategory\CreateService;

class MenuCategoryRepository implements MenuCategoryInterface
{
    public function create($request)
    {
        DB::beginTransaction();

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
