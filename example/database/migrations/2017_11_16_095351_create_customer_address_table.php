<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('customer_id')->nullable();
            $table->integer('customer_address_id')->nullable();
            $table->string('email', 250)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->string('postcode', 20)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('telephone', 50)->nullable();
            $table->string('country_id', 10)->nullable();
            $table->string('address_type', 50)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('country', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_address');
    }
}
