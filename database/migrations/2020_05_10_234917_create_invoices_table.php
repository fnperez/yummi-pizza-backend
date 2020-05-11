<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->string('sub_total')->default(0);
            $table->string('delivery_cost')->default(0);
            $table->string('total_price')->default(0);
            $table->enum('status', [\YummiPizza\Immutables\Invoice\InvoiceStatus::PENDING, \YummiPizza\Immutables\Invoice\InvoiceStatus::PAYED])->default(\YummiPizza\Immutables\Invoice\InvoiceStatus::PENDING);
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->uuid('address_id');
            $table->uuid('cart_id');
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('users');

            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');

            $table->foreign('cart_id')
                ->references('id')
                ->on('carts');
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
