<?php

namespace App\Repositories\Order;

use App\Interfaces\Order\OrderTypeInterface;
use App\Services\Order\OrderType\CreateService;
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
}
