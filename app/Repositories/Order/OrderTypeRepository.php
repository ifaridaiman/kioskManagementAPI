<?php

namespace App\Repositories\Order;

use App\Interfaces\Order\OrderTypeInterface;
use App\Services\Order\OrderType\CreateService;
use App\Services\Order\OrderType\GetService;
use App\Services\Order\OrderType\UpdateService;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderTypeRepository implements OrderTypeInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

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
}
