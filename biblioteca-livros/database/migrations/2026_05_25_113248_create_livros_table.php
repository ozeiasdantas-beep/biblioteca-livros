<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('editora');
            $table->integer('paginas');
            $table->string('genero');
            $table->integer('ano_publicacao');
            $table->text('sinopse')->nullable();
            $table->string('capa')->nullable(); // imagem
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('livros');
    }
};