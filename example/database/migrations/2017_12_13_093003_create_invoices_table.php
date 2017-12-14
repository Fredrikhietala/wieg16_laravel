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
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('customer_id')->index()->nullable();
            $table->decimal('subtotal', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->decimal('shipping_amount', 12, 4)->nullable();
            $table->decimal('shipping_tax_amount', 12, 4)->nullable();
            $table->decimal('grand_total', 12, 4)->nullable();
            $table->boolean('invoice_billed')->nullable();
            $table->unsignedBigInteger('serial_number')->nullable();
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
