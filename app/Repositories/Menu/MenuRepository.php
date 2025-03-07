<?php

namespace App\Repositories\Menu;

use App\Interfaces\Menu\MenuInterface;
use App\Services\Menu\CreateService;
use App\Services\Menu\FindService;
use App\Services\Menu\GetService;
use Exception;
use Illuminate\Support\Facades\DB;

class MenuRepository implements MenuInterface
{
    public function create($request)
    {
        DB::beginTransaction();

        try {
            $createService = new CreateService();

            $response = $createService->create($request);

            DB::commit();

            return $response;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function get($request)
    {
        try {
            $getService = new GetService();

            return $getService->get($request);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function find($id)
    {
        try {
            $findService = new FindService();

            return $findService->find($id);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
