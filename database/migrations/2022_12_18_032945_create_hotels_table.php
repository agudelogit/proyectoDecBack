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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->integer('nit_hotel')->unique();
            $table->string('nombre_hotel');
            $table->string('direccion_hotel');
            $table->bigInteger('telefono_hotel');
            $table->string('ciudad_hotel');
            $table->text('descripcion_hotel');
            $table->integer('numero_habitaciones_hotel');
            $table->string('id_usuario');
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
        Schema::dropIfExists('hotels');
    }
};
