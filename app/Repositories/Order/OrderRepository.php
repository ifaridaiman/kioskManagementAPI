<?php

namespace App\Repositories\Order;

use App\Services\Order\GetService;
use App\Services\Order\OrderStatus\CreateService as StatusCreateService;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Repositories\PaymentRepository;
use App\Interfaces\Order\OrderInterface;
use App\Services\Order\CreateService as OrderCreateService;
use App\Services\Customer\CreateService as CustomerCreateService;
use App\Services\Order\OrderItem\CreateService as ItemCreateService;

class OrderRepository implements OrderInterface
{

    public function __construct(
        protected PaymentRepository $paymentRepository
    ) {
    }

    public function create($request, $id)
    {
        DB::beginTransaction();

        try {
            $createCustomer = new CustomerCreateService();
            $createOrder = new OrderCreateService();
            $createItem = new ItemCreateService();
            $createStatus = new StatusCreateService();

            $total = calculateTotal($request);

            $payment = $this->paymentRepository->create($request, $id, $total);
            $customer = $createCustomer->create($request);
            $order = $createOrder->create($request, $customer, $payment);
            $createItem->create($request, $order->id);
            $createStatus->create($order);

            DB::commit();

            return $payment;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function get($requset)
    {
        try {
            $getService = new GetService();

            return $getService->get($requset);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
