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
        Schema::create('grupos', function (Blueprint $table) {
            $table->integer('id_grupo', true);
            $table->integer('id_idioma')->index('id_idioma');
            $table->integer('id_sistema')->index('id_sistema');
            $table->integer('id_categoria')->index('id_categoria');
            $table->integer('id_plantel')->index('id_plantel');
            $table->integer('nivel');
            $table->date('fecha_inicio');
            $table->time('hora_entrada');
            $table->boolean('lunes')->nullable();
            $table->boolean('martes')->nullable();
            $table->boolean('miercoles')->nullable();
            $table->boolean('jueves')->nullable();
            $table->boolean('viernes')->nullable();
            $table->boolean('sabado')->nullable();
            $table->integer('id_empleado')->nullable()->index('id_empleado');
            $table->string('modificado_por', 30)->nullable();
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
            $table->string('estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
};
