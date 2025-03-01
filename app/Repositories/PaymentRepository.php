<?php

namespace App\Repositories;

use App\Interfaces\PaymentInterface;
use App\Services\Collection\GetService;
use App\Services\Payment\CreateService;
use App\Services\PaymentGateway\BillPlz\CreateBillService;
use Exception;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentInterface
{
    public function create($request, $id)
    {
        DB::beginTransaction();

        try {

            $getCollectionService = new GetService();
            $createPaymentService = new CreateService();
            $createBillService = new CreateBillService();

            $collection = $getCollectionService->getFirst($id);

            $bill = $createBillService->create($request, $collection);

            $payment = $createPaymentService->create($request, $bill, $collection);

            DB::commit();

            return $payment;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
