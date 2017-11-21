<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('email', 250)->nullable();
            $table->string('firstname', 50)->nullable();
            $table->string('lastname', 50)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('customer_activated')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('customer_company', 100)->nullable();
            $table->integer('default_billing')->nullable();
            $table->integer('default_shipping')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->timestamps();
            $table->string('customer_invoice_email', 250)->nullable();
            $table->string('customer_extra_text', 250)->nullable();
            $table->tinyInteger('customer_due_date_period')->nullable();
            $table->bigInteger('company_id', false, true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
