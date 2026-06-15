<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Título *</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                value="{{ old('titulo', $livro->titulo ?? '') }}">
            @error('titulo')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Autor *</label>
            <input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror"
                value="{{ old('autor', $livro->autor ?? '') }}">
            @error('autor')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Editora *</label>
            <input type="text" name="editora" class="form-control @error('editora') is-invalid @enderror"
                value="{{ old('editora', $livro->editora ?? '') }}">
            @error('editora')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Gênero *</label>
            <input type="text" name="genero" class="form-control @error('genero') is-invalid @enderror"
                value="{{ old('genero', $livro->genero ?? '') }}" placeholder="Ex: Romance, Ficção, Fantasia...">
            @error('genero')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Número de Páginas *</label>
            <input type="number" name="paginas" class="form-control @error('paginas') is-invalid @enderror"
                value="{{ old('paginas', $livro->paginas ?? '') }}">
            @error('paginas')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Ano de Publicação *</label>
            <input type="number" name="ano_publicacao" class="form-control @error('ano_publicacao') is-invalid @enderror"
                value="{{ old('ano_publicacao', $livro->ano_publicacao ?? '') }}" placeholder="Ex: 1998">
            @error('ano_publicacao')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Capa do Livro {{ isset($livro) ? '(deixe vazio para manter)' : '*' }}</label>
            <input type="file" name="capa" class="form-control-file @error('capa') is-invalid @enderror" accept="image/*">
            @error('capa')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if(isset($livro) && $livro->capa)
                <div class="mt-2">
                    <small>Capa atual:</small><br>
                    <img src="{{ Storage::url($livro->capa) }}" height="100" style="border-radius:4px;">
                </div>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label>Sinopse</label>
    <textarea name="sinopse" rows="4" class="form-control @error('sinopse') is-invalid @enderror">{{ old('sinopse', $livro->sinopse ?? '') }}</textarea>
    @error('sinopse')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>