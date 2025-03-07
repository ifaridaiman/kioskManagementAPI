<?php

namespace App\Repositories;

use App\Interfaces\PaymentInterface;
use App\Services\Collection\GetService as CollectionGetService;
use App\Services\Payment\CreateService;
use App\Services\Payment\GetService as PaymentGetService;
use App\Services\Payment\RedirectUrlService;
use App\Services\PaymentGateway\BillPlz\CreateBillService;
use Exception;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentInterface
{
    public function create($request, $id, $total = 0)
    {
        DB::beginTransaction();

        try {

            $getCollectionService = new CollectionGetService();
            $createPaymentService = new CreateService();
            $createBillService = new CreateBillService();

            $collection = $getCollectionService->getFirst($id);

            $bill = $createBillService->create($request, $collection, $total);

            $payment = $createPaymentService->create($request, $bill, $collection, $total);

            DB::commit();

            return $payment;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function redirectUrl($request)
    {
        DB::beginTransaction();

        try {
            $redirectService = new RedirectUrlService();

            $redirect = $redirectService->redirectUrl($request);

            DB::commit();

            return $redirect;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function callbackUrl($request)
    {

    }

    public function get()
    {
        try {
            $getService = new PaymentGetService();

            return $getService->get();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
