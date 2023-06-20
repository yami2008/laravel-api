<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engins', function (Blueprint $table) {
            $table->bigIncrements('id_engin');

            $table->string('engin')->nullable();
            $table->string('moteur')->nullable();
            $table->string('application')->nullable();
            $table->string('num_serie_moteur')->nullable();
            $table->string('type_moteur')->nullable();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id_client')->on('clients')->cascadeOnUpdate()->cascadeOnDelete() ;

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
        Schema::dropIfExists('engins');
    }
};
