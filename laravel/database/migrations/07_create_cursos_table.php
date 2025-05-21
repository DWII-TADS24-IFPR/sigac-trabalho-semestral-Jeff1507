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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('sigla')->unique();
            $table->float('total_horas');
            $table->unsignedBigInteger('nivel_id');
            $table->unsignedBigInteger('eixo_id');
            $table->foreign('nivel_id')->references('id')->on('niveis')->onDelete('cascade');
            $table->foreign('eixo_id')->references('id')->on('eixos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
