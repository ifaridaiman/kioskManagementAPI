<?php

namespace App\Http\Controllers\PaymentGateway\BillPlz;

use App\Http\Controllers\Controller;
use App\Interfaces\PaymentGateway\BillPlz\CollectionInterface;
use Exception;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function __construct(
        protected CollectionInterface $collectionInterface
    ) {
    }

    public function create(Request $request)
    {
        try {
            return $this->collectionInterface->create($request);
        } catch (Exception $e) {
            return response()->json(['message'=> $e]);
        }
    }

}
