<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lot_number')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('odometer')->nullable();
            $table->string('highlight')->nullable();
            $table->string('pri_damage')->nullable();
            $table->string('sec_damage')->nullable();
            $table->string('ret_value')->nullable();
            $table->string('vin_code')->nullable();
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
        Schema::dropIfExists('lot_infos');
    }
}
