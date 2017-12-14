<?php

namespace App\Console\Commands;

use App\Invoice;
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
        $invoice = Invoice::find($id);
        
    }
}
