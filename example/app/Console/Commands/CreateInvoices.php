<?php

namespace App\Console\Commands;

use App\Invoice;
use Faker\Provider\DateTime;
use Illuminate\Console\Command;

class CreateInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create an empty invoice';

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
        $invoice = new Invoice();
        $invoice->create();
        $this->info("New invoice created");

        /*$date = date_create('2017-11-25');
        $date->modify('+ 30 day');
        echo $date->format('Y-m-d');*/
    }
}
