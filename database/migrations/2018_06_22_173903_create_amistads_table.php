<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmistadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amistades', function (Blueprint $table) {
            $table->string('persona_id')->index();
            $table->string('amigo_id')->index();
            $table->smallInteger('status');
            $table->timestamps();

            $table->foreign('persona_id')->references('email')->on('persona');
            $table->foreign('amigo_id')->references('email')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amistades');
    }
}
