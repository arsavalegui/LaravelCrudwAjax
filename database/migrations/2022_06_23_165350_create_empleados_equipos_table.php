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
        Schema::create('empleados_equipos', function (Blueprint $table) {
            //$table->id();

            //$table->primary(['empleado_id','equipo_id']);
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('equipo_id');
            $table->timestamps();
            
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('equipo_id')->references('id')->on('equipos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_equipos');
    }
};
