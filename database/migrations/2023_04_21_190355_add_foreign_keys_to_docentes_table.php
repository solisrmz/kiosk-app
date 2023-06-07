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
        Schema::table('docentes', function (Blueprint $table) {
            $table->foreign(['id_empleado'], 'docentes_ibfk_1')->references(['id_empleado'])->on('empleados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_idioma1'], 'docentes_ibfk_2')->references(['id_idioma'])->on('idiomas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_idioma2'], 'docentes_ibfk_3')->references(['id_idioma'])->on('idiomas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_idioma3'], 'docentes_ibfk_4')->references(['id_idioma'])->on('idiomas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_idioma4'], 'docentes_ibfk_5')->references(['id_idioma'])->on('idiomas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropForeign('docentes_ibfk_1');
            $table->dropForeign('docentes_ibfk_2');
            $table->dropForeign('docentes_ibfk_3');
            $table->dropForeign('docentes_ibfk_4');
            $table->dropForeign('docentes_ibfk_5');
        });
    }
};
