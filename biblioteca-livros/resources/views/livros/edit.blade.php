@extends('adminlte::page')

@section('title', 'Editar Livro')

@section('content_header')
    <h1>Editar Livro</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('livros.update', $livro) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('livros._form')
            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection