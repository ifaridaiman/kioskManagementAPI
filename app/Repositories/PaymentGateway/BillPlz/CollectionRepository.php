<?php

namespace App\Repositories\PaymentGateway\BillPlz;

use App\Interfaces\PaymentGateway\BillPlz\CollectionInterface;
use App\Services\Collection\StoreService;
use App\Services\PaymentGateway\BillPlz\CreateCollectionService;
use Exception;
use Illuminate\Support\Facades\DB;

class CollectionRepository implements CollectionInterface
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
        $gatewayCollectionService = new CreateCollectionService();
        $storeService = new StoreService();

        try {
            DB::beginTransaction();

            $data = $gatewayCollectionService->create($request->title);

            // Process the response before moving forward
            if (!$data) {
                throw new Exception("Failed to retrieve data from API");
            }

            $collection = $storeService->store($data);

            DB::commit();

            return $collection;
        } catch(Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
