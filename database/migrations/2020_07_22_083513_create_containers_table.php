<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('container_number');
            $table->string('booking_number');
            $table->string('shipping_line');
            $table->string('point_of_loading');
            $table->string('destination_port');
            $table->date('loading_date');
            $table->date('expected_sailing_date');
            $table->date('expected_arrival_date');
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
        Schema::dropIfExists('containers');
    }
}
