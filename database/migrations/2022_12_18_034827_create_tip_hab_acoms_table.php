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
        Schema::create('tip_hab_acoms', function (Blueprint $table) {
            $table->id();
            $table->integer('id_hotel');
            $table->integer('id_tipo_habitacion');
            $table->integer('id_acomodacion');
            $table->integer('num_habitaciones');
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
        Schema::dropIfExists('tip_hab_acoms');
    }
};
