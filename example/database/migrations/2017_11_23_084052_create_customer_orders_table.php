<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();
            $table->string('increment_id', 20)->nullable();
            $table->bigInteger('customer_id', false, true)->nullable();
            $table->string('customer_email', 255)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('marking', 100)->nullable();
            $table->decimal('grand_total', 12, 4)->nullable();
            $table->decimal('subtotal', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->bigInteger('billing_address_id', false, true)->nullable();
            $table->bigInteger('shipping_address_id', false, true)->nullable();
            $table->string('shipping_method', 100)->nullable();
            $table->decimal('shipping_amount', 12, 4)->nullable();
            $table->decimal('shipping_tax_amount', 12, 4)->nullable();
            $table->string('shipping_description', 255)->nullable();
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
        Schema::dropIfExists('customer_orders');
    }
}
