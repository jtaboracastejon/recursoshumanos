<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametosEvaluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametos_evaluars', function (Blueprint $table) {
            $table->id();
            $table->integer('niveldeIniciativa');
            $table->integer('generaciondeIdeas');
            $table->integer('resoluciondeProblemas');
            $table->integer('cumplimientodeObjetivo');
            $table->integer('calidaddeTrabajo');
            $table->foreignId('userEvaluado_id')->constrained('users');
            $table->foreignId('userEvaluador_id')->constrained('users');
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
        Schema::dropIfExists('parametos_evaluars');
    }
}
