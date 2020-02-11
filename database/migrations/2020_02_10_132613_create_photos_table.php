<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path_to_front');
            $table->string('name');
            $table->string('folder_link');
            $table->unsignedBigInteger('part_id');
            $table->foreign('part_id')
                ->references('id')
                ->on('parts')
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
        Schema::dropIfExists('part_images');
    }
}
