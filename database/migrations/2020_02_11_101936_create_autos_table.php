<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('make_name');
            $table->string('model_name');
            $table->unsignedBigInteger('client_id');
            $table->enum('status', ['dispatched', 'title_delay', 'ready_to_load', 'loaded', 'shipped', 'delivered'])
                    ->default('dispatched');
            $table->boolean('offsite')->default(0);
            $table->integer('offsite_price')->nullable();
            $table->string('auction')->nullable();
            $table->date('purchased_date');
            $table->unsignedBigInteger('container_id')->nullable();
            $table->foreign('client_id')
                    ->references('id')
                    ->on('clients')
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
        Schema::dropIfExists('autos');
    }
}
