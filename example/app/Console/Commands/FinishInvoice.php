<?php

namespace App\Console\Commands;

use App\CustomerOrder;
use App\Invoice;
use DateTime;
use DB;
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
        $orders = CustomerOrder::where('invoice_id', '=', $invoiceId)->get();
        $subtotal = 0;
        $tax_amount = 0;
        $shipping_amount = 0;
        $shipping_tax_amount = 0;
        foreach ($orders as $order) {
            $subtotal += $order->subtotal;
            $tax_amount += $order->tax_amount;
            $shipping_amount += $order->shipping_amount;
            $shipping_tax_amount += $order->shipping_tax_amount;
        }
        $invoice->invoice_date = date('Y-m-d');
        $invoice->due_date = Invoice::dueDate();
        $invoice->customer_id = $orders['customer_id'];
        $invoice->subtotal = $subtotal;
        $invoice->tax_amount = $tax_amount;
        $invoice->shipping_amount = $shipping_amount;
        $invoice->shipping_tax_amount = $shipping_tax_amount;
        $invoice->grand_total_incl_tax = Invoice::recalculate();
        $invoice->invoice_billed = true;
        $invoice->serial_number = Invoice::getSerialNumber() + 170000;
        $invoice->serial_number_id = Invoice::getSerialNumber();
        $invoice->save();

        $this->info("Finished invoice with id: " .$invoiceId);
    }
}
