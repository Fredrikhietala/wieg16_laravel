<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_items', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();
            $table->bigInteger('order_id', false, true)->nullable();
            $table->bigInteger('item_id', false, true)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('sku', 50)->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('price', 12, 4)->nullable();
            $table->decimal('tax_amount', 12, 4)->nullable();
            $table->decimal('row_total', 12, 4)->nullable();
            $table->decimal('price_incl_tax', 12, 4)->nullable();
            $table->decimal('total_incl_tax', 12, 4)->nullable();
            $table->decimal('tax_percent', 12, 4)->nullable();
            $table->string('amount_package', 20)->nullable();
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
        Schema::dropIfExists('customer_items');
    }
}
