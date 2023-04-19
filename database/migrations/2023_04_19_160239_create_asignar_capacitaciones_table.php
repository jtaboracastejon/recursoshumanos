<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarCapacitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar_capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('capacitacion_id')->constrained('capacitaciones');
            $table->foreignId('userACapacitar_id')->constrained('users');
            $table->foreignId('userCapacitador_id')->constrained('users');
            $table->enum('estado', ['ASIGNADA', 'FINALIZADO'])->default('ASIGNADA');
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
        Schema::dropIfExists('asignar_capacitaciones');
    }
}
