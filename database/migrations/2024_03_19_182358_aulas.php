<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create ('aulas', function (Blueprint $table){
            $table-> id('idAulas');
            $table-> string ('nombre');
            $table-> integer ('capacidad');
            $table-> boolean('data')->default('false');
            $table-> string ('tipo_aula');
            $table-> boolean('pizarra')->default('false');
            $table->string('imagen');
            $table-> boolean('wifi')->default('false');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
