<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('password');
            $table->string('smalldesc')->nullable();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('city');
            $table->char('pais', 3);
            $table->text('description')->nullable();
            $table->text('avatar')->nullable();
            $table->text('font')->nullable();
            $table->timestamps();

            $table->foreign('pais')->references('codigo')->on('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
