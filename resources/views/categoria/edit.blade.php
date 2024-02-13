@extends('adminlte::page')
@section('css')
    
@stop

@section('title', 'Editar Categoria')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
{{-- @section('plugins.Moment', true) --}}

@section('content')
    <div class="container p-3">
        <div class="card">
            <div class="card-header">
                FORMULARIO EDITAR CATEGORIA
            </div>
            <div class="card-body">
                <!-- Formulario para editar una categoría existente -->
                <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('categoria.form')
                    <div class="text-center"> <!-- Div para centrar el botón -->
                        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button> <!-- Botón con clases de Bootstrap y tamaño grande -->
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
    </script>
@stop
