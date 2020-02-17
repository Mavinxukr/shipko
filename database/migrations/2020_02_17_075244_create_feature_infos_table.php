<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('body_style')->nullable();
            $table->string('color')->nullable();
            $table->string('eng_type')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('trans')->nullable();
            $table->string('drive')->nullable();
            $table->string('fuel')->nullable();
            $table->string('key')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('feature_infos');
    }
}
