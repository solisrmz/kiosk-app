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
        Schema::create('listas', function (Blueprint $table) {
            $table->integer('id_grupo');
            $table->string('curp', 18)->index('curp');
            $table->string('modificado_por', 30)->nullable();
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();

            $table->primary(['id_grupo', 'curp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas');
    }
};
