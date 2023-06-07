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
        Schema::table('grupos', function (Blueprint $table) {
            $table->foreign(['id_idioma'], 'grupos_ibfk_1')->references(['id_idioma'])->on('idiomas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_sistema'], 'grupos_ibfk_2')->references(['id_sistema'])->on('sistemas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_categoria'], 'grupos_ibfk_3')->references(['id_categoria'])->on('categorias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_plantel'], 'grupos_ibfk_4')->references(['id_plantel'])->on('planteles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_empleado'], 'grupos_ibfk_5')->references(['id_empleado'])->on('docentes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign('grupos_ibfk_1');
            $table->dropForeign('grupos_ibfk_2');
            $table->dropForeign('grupos_ibfk_3');
            $table->dropForeign('grupos_ibfk_4');
            $table->dropForeign('grupos_ibfk_5');
        });
    }
};
