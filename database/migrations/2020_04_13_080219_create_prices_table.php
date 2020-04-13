<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('price');
            $table->unsignedBigInteger('priceable_id');
            $table->string('priceable_type');
            $table->dateTime('due_day');
            $table->timestamps();
        });

        Schema::create('price_city', function (Blueprint $table){
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('price_id')
                ->references('id')
                ->on('prices')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
