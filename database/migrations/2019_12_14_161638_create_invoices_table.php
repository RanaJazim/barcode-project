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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inventory_id')->index();
            $table->unsignedBigInteger('customer_id')->index();
            $table->string('onDate');
            $table->string('dueDate');
            $table->string('incNumber');
            $table->string('batchNumber');
            $table->integer('qty');
            $table->integer('unitPrice');
            $table->integer('discount');
            $table->integer('finalPrice');
            $table->timestamps();

            $table->foreign('inventory_id')->references('id')
                ->on('inventories')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade');
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
