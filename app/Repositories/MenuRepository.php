<?php

namespace App\Repositories;

use App\Interfaces\MenuInterface;
use App\Services\Menu\CreateService;
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
}
