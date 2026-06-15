<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Http\Requests\LivroRequest;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller {

   public function index() {
    $livros        = Livro::latest()->paginate(10);
    $totalGeneros  = Livro::distinct('genero')->count('genero');
    $totalPaginas  = Livro::sum('paginas');
    $comCapa       = Livro::whereNotNull('capa')->count();

    return view('livros.index', compact('livros', 'totalGeneros', 'totalPaginas', 'comCapa'));
    }

    public function create() {
        return view('livros.create');
    }

    public function store(LivroRequest $request) {
        $dados = $request->validated();

        if ($request->hasFile('capa')) {
            $dados['capa'] = $request->file('capa')->store('capas', 'public');
        }

        Livro::create($dados);

        return redirect()->route('livros.index')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    public function show(Livro $livro) {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro) {
        return view('livros.edit', compact('livro'));
    }

    public function update(LivroRequest $request, Livro $livro) {
        $dados = $request->validated();

        if ($request->hasFile('capa')) {
            // Remove a capa antiga
            if ($livro->capa) {
                Storage::disk('public')->delete($livro->capa);
            }
            $dados['capa'] = $request->file('capa')->store('capas', 'public');
        } else {
            unset($dados['capa']); // mantém a capa atual
        }

        $livro->update($dados);

        return redirect()->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro) {
        if ($livro->capa) {
            Storage::disk('public')->delete($livro->capa);
        }
        $livro->delete();

        return redirect()->route('livros.index')
            ->with('success', 'Livro excluído com sucesso!');
    }
}