@extends('adminlte::page')

@section('title', 'Biblioteca de Livros')

@section('content_header')
    <h1><i class="fas fa-book mr-2"></i> Biblioteca de Livros</h1>
@endsection

@section('content')

<form id="form-logout" action="{{ route('logout') }}" method="POST" style="display:none">
    @csrf
</form>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

{{-- Cards de estatísticas --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-book"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total de Livros</span>
                <span class="info-box-number">{{ $livros->total() }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-layer-group"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Gêneros</span>
                <span class="info-box-number">{{ $totalGeneros }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total de Páginas</span>
                <span class="info-box-number">{{ number_format($totalPaginas, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-image"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Com Capa</span>
                <span class="info-box-number">{{ $comCapa }}</span>
            </div>
        </div>
    </div>
</div>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-list mr-1"></i> Lista de Livros</h3>
        <div class="card-tools">
            <a href="{{ route('livros.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Novo Livro
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th width="80">Capa</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Gênero</th>
                    <th>Ano</th>
                    <th width="140">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livros as $livro)
                <tr>
                    <td>
                        @if($livro->capa)
                            <img src="{{ Storage::url($livro->capa) }}" width="50" height="70"
                                style="object-fit:cover; border-radius:6px; box-shadow: 0 2px 6px rgba(0,0,0,.2);">
                        @else
                            <div style="width:50px;height:70px;background:#f0f0f0;border-radius:6px;display:flex;align-items:center;justify-content:center;">
                                <i class="fas fa-book text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td class="align-middle"><strong>{{ $livro->titulo }}</strong></td>
                    <td class="align-middle">{{ $livro->autor }}</td>
                    <td class="align-middle">{{ $livro->editora }}</td>
                    <td class="align-middle">
                        <span class="badge badge-info">{{ $livro->genero }}</span>
                    </td>
                    <td class="align-middle">{{ $livro->ano_publicacao }}</td>
                    <td class="align-middle">
                        <a href="{{ route('livros.show', $livro) }}" class="btn btn-info btn-xs">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning btn-xs">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Excluir este livro?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-xs">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <i class="fas fa-book-open fa-2x text-muted mb-2"></i><br>
                        Nenhum livro cadastrado ainda.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $livros->links() }}
    </div>
</div>

@endsection

@section('js')
<script>
document.querySelectorAll('.nav-sidebar a').forEach(function(link) {
    if (link.textContent.trim() === 'Sair') {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('form-logout').submit();
        });
    }
});
</script>
@endsection