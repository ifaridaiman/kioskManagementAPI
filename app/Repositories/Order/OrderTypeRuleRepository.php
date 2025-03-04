<?php

namespace App\Repositories\Order;

use App\Interfaces\Order\OrderTypeRuleInterface;
use App\Services\Order\OrderTypeRule\CreateService;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderTypeRuleRepository implements OrderTypeRuleInterface
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

            DB::commit();

            return $createService->create($request);
        } catch (Exception $e) {
            DB::rollBack();
            
            throw $e;
        }
    }
}
