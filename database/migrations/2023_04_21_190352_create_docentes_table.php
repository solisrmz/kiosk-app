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
        Schema::create('docentes', function (Blueprint $table) {
            $table->integer('id_empleado')->primary();
            $table->integer('id_idioma1')->index('id_idioma1');
            $table->integer('id_idioma2')->nullable()->index('id_idioma2');
            $table->integer('id_idioma3')->nullable()->index('id_idioma3');
            $table->integer('id_idioma4')->nullable()->index('id_idioma4');
            $table->string('modificado_por', 30)->nullable();
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
