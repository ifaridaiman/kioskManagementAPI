<?php

namespace App\Repositories\Order;

use Exception;
use App\Services\Order\GetService;
use Illuminate\Support\Facades\DB;
use App\Repositories\PaymentRepository;
use App\Interfaces\Order\OrderInterface;
use App\Services\Menu\CheckQuantityService;
use App\Services\Order\OrderStatus\UpdateStatusService;
use App\Services\Menu\MenuInventory\StockCheckingService;
use App\Services\Order\CreateService as OrderCreateService;
use App\Services\Customer\CreateService as CustomerCreateService;
use App\Services\Order\OrderItem\CreateService as ItemCreateService;
use App\Services\Order\OrderStatus\CreateService as StatusCreateService;

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
            $quantityCheck = new CheckQuantityService();

            foreach ($request->orders as $item) {
                try {
                    $quantityCheck->checkQuantity($item["id"], $item["quantity"]);
                } catch (Exception $e) {
                    throw $e;
                }
            }

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

    public function updateStatus($request, $id)
    {
        DB::beginTransaction();

        try {
            $updateService = new UpdateStatusService();

            $update = $updateService->updateStatus($request, $id);

            DB::commit();

            return $update;

        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
