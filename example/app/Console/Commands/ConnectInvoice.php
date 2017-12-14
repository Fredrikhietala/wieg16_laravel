<?php

namespace App\Console\Commands;

use App\CustomerOrder;
use App\Invoice;
use DB;
use Illuminate\Console\Command;

class ConnectInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:connect {id} {order_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connecting an invoice with an order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');
        Invoice::find($id);
        $orderId = $this->argument('order_id');
        CustomerOrder::find($orderId);

        DB::table('customer_orders')->where('id', '=', $orderId)->update(['invoice_id' => $id]);
        $this->info("Updating orders table with invoice_id: ".$id);

    }
}
