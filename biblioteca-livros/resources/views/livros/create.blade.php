@extends('adminlte::page')

@section('title', 'Cadastrar Livro')

@section('content_header')
    <h1>Cadastrar Livro</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('livros._form')
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection