@extends('adminlte::page')

@section('title', $livro->titulo)

@section('content_header')
    <h1>{{ $livro->titulo }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                @if($livro->capa)
                    <img src="{{ Storage::url($livro->capa) }}" class="img-fluid" style="max-height:300px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,.2)">
                @else
                    <div class="bg-light p-5 text-muted" style="border-radius:8px">Sem capa</div>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr><th width="160">Título</th><td>{{ $livro->titulo }}</td></tr>
                    <tr><th>Autor</th><td>{{ $livro->autor }}</td></tr>
                    <tr><th>Editora</th><td>{{ $livro->editora }}</td></tr>
                    <tr><th>Gênero</th><td>{{ $livro->genero }}</td></tr>
                    <tr><th>Páginas</th><td>{{ $livro->paginas }}</td></tr>
                    <tr><th>Ano</th><td>{{ $livro->ano_publicacao }}</td></tr>
                    <tr><th>Sinopse</th><td>{{ $livro->sinopse ?? 'Não informada' }}</td></tr>
                </table>
                <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection