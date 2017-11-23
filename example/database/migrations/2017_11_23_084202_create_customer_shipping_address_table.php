<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_shipping_addresses', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();
            $table->bigInteger('customer_id', false, true)->nullable();
            $table->bigInteger('customer_address_id', false, true)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('postcode', 20)->nullable();
            $table->string('street', 75)->nullable();
            $table->string('city', 75)->nullable();
            $table->string('telephone', 50)->nullable();
            $table->string('country_id', 25)->nullable();
            $table->string('address_type', 50)->nullable();
            $table->string('company', 50)->nullable();
            $table->string('country', 50)->nullable();
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
        Schema::dropIfExists('customer_shipping_addresses');
    }
}
