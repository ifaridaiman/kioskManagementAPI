<?php

namespace App\Console\Commands;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Services\PaymentGateway\BillPlz\CreateBillService;
use App\Services\PaymentGateway\BillPlz\CreateCollectionService;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $collection = new CreateBillService();

        $request = new Request([
            'collection_id' => 'xwisqn7c',
            'descr' => 'testing',
            'email' => 'adlyalimin.work@gmail.com',
            'name' => 'Adly Alimin',
            'amount' => '10.40'
        ]);

        $collection->create($request);
    }
}
