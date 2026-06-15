<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder {
    public function run(): void {
        $livros = [
            ['titulo' => 'Dom Casmurro', 'autor' => 'Machado de Assis', 'editora' => 'Companhia das Letras', 'paginas' => 256, 'genero' => 'Romance', 'ano_publicacao' => 1899, 'sinopse' => 'Bentinho e Capitu e a famosa questão do ciúme.'],
            ['titulo' => 'O Alquimista', 'autor' => 'Paulo Coelho', 'editora' => 'HarperCollins', 'paginas' => 208, 'genero' => 'Ficção', 'ano_publicacao' => 1988, 'sinopse' => 'A jornada de um pastor em busca de seu tesouro.'],
            ['titulo' => 'Harry Potter e a Pedra Filosofal', 'autor' => 'J.K. Rowling', 'editora' => 'Rocco', 'paginas' => 264, 'genero' => 'Fantasia', 'ano_publicacao' => 1997, 'sinopse' => 'Um jovem bruxo descobre seus poderes.'],
            ['titulo' => 'O Senhor dos Anéis', 'autor' => 'J.R.R. Tolkien', 'editora' => 'Martins Fontes', 'paginas' => 1200, 'genero' => 'Fantasia', 'ano_publicacao' => 1954, 'sinopse' => 'A jornada para destruir o Um Anel.'],
            ['titulo' => '1984', 'autor' => 'George Orwell', 'editora' => 'Companhia das Letras', 'paginas' => 336, 'genero' => 'Distopia', 'ano_publicacao' => 1949, 'sinopse' => 'Uma sociedade totalitária vigiada pelo Grande Irmão.'],
        ];

        foreach ($livros as $livro) {
            Livro::create($livro);
        }
    }
}