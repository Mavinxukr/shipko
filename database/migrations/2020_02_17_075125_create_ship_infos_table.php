<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('container_id')->nullable();
            $table->string('tracking_id')->nullable();
            $table->string('point_load_city')->nullable();
            $table->string('point_load_date')->nullable();
            $table->string('point_delivery_city')->nullable();
            $table->string('point_delivery_date')->nullable();
            $table->integer('disassembly')->default(0);
            $table->enum('damage_status', [
                'case_closed', 'under_unvestigation', 'compensation_given'
            ])->default('case_closed');
            $table->unsignedBigInteger('auto_id');
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
        Schema::dropIfExists('ship_infos');
    }
}
