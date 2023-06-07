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
        Schema::table('listas', function (Blueprint $table) {
            $table->foreign(['id_grupo'], 'listas_ibfk_1')->references(['id_grupo'])->on('grupos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['curp'], 'listas_ibfk_2')->references(['curp'])->on('alumnos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listas', function (Blueprint $table) {
            $table->dropForeign('listas_ibfk_1');
            $table->dropForeign('listas_ibfk_2');
        });
    }
};
