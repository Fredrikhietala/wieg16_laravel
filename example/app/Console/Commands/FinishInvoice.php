<?php

namespace App\Console\Commands;

use App\Invoice;
use Illuminate\Console\Command;

class FinishInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:finish {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finish the invoice';

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
        $invoiceId = $this->argument('id');
        $invoice = Invoice::find($invoiceId);
        $invoice->recalculate();
        $invoice->invoice_date = date('Y-m-d');
        $invoice->due_date = Invoice::dueDate();
        $invoice->invoice_billed = true;
        $invoice->getSerialNumber();
        $invoice->year = date('y');
        $invoice->save();

        $this->info("Finished invoice with id: " .$invoiceId);
    }
}
