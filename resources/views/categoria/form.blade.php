<!-- Formulario para crear una nueva categoría -->

<div class="form-floating mb-3">
    {{-- <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoría" value="{{ old($categoria) ? $categoria->categoria : '' }}"> --}}
    <input type="text" class="form-control  @error('categoria') is-invalid @enderror" id="categoria" name="categoria" placeholder="Categoría" value="{{ old('categoria', isset($categoria) ? $categoria->categoria : '') }}">

    <label for="categoria">Categoría</label>
</div>
@error('categoria')
    <div class="text-danger">{{ $message }}</div>
@enderror

