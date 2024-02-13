@extends('adminlte::page')
@section('css')
    
@stop

@section('title', 'Crear Categoria')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
{{-- @section('plugins.Moment', true) --}}

@section('content')
    <div class="container p-3">
        <div class="card">
            <div class="card-header">
                FORMULARIO CREAR CATEGORIA
            </div>
            <div class="card-body">
                <form action="{{ route('categoria.store') }}" method="POST">
                    @csrf
                    @include('categoria.form')
                    <div class="text-center"> <!-- Div para centrar el botón -->
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button> <!-- Botón con clases de Bootstrap y tamaño grande -->
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
