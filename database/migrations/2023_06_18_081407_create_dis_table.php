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
        Schema::create('dis', function (Blueprint $table) {
            $table->bigIncrements('id_dis');
            $table->string('numero_dis')->unique();

            $table->unsignedBigInteger('engin_id');
            $table->foreign('engin_id')->references('id_engin')->on('engins')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id_client')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('dis');
    }
};
