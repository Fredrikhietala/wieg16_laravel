<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('invoice_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->unsignedBigInteger('customer_id')->index()->nullable();
            $table->decimal('total_excl_vat', 12, 4)->nullable();
            $table->decimal('total_vat', 12, 4)->nullable();
            $table->decimal('total_shipping_excl_vat', 12, 4)->nullable();
            $table->decimal('total_vat_shipping', 12, 4)->nullable();
            $table->decimal('grand_total_incl_vat', 12, 4)->nullable();
            $table->boolean('invoice_billed')->nullable();
            $table->unsignedInteger('serial_number', 170000)->nullable();
            $table->unsignedBigInteger('order_id')->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
