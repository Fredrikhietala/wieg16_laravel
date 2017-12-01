<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('entity_id', false, true)->primary();
            $table->bigInteger('entity_type_id', false, true)->nullable();
            $table->bigInteger('attribute_set_id', false, true)->nullable();
            $table->string('type_id', 50)->nullable();
            $table->string('sku', 50)->nullable();
            $table->integer('has_options')->nullable();
            $table->integer('required_options')->nullable();
            $table->integer('status')->nullable();
            $table->string('name', 250)->nullable();
            $table->string('amount_package', 20)->nullable();
            $table->decimal('price', 12, 4)->nullable();
            $table->integer('is_salable')->nullable();
            $table->integer('is_in_stock')->nullable();
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
        Schema::dropIfExists('products');
    }
}
