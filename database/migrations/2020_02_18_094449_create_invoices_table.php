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
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('name_car')->nullable();
            $table->bigInteger('total_price')->nullable();
            $table->bigInteger('paid_price')->nullable();
            $table->bigInteger('outstanding_price')->nullable();
            $table->enum('status', ['paid', 'not paid', 'relist', 'refund'])->nullable();
            $table->bigInteger('total_shipping_price')->nullable();
            $table->bigInteger('paid_shipping_price')->nullable();
            $table->bigInteger('outstanding_shipping_price')->nullable();
            $table->enum('status_shipping', ['not mosta7a8', 'mosta7a8', 'not paid', 'paid'])->nullable();
            $table->dateTime('due_day');
            $table->unsignedBigInteger('auto_id')->nullable();
            $table->foreign('auto_id')
                ->references('id')
                ->on('autos')
                ->onDelete('cascade');
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
