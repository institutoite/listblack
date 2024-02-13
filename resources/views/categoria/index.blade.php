@extends('adminlte::page')
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('title', 'Categorias')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
{{-- @section('plugins.Moment', true) --}}

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lista de las categorías existentes</h5>
                    <a href="{{ route('categoria.create') }}" class="btn btn-primary" class="btn btn-primary">Crear</a>
                </div>
            </div>
            
            <div class="card-body">
                <table id="tablaCategorias" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>categoria</th>
                            <th>estado</th>
                            <th>creado</th>
                            <th>actualizado</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
            
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
     
        $(document).ready(function() {
    // Formatear la fecha actual
            var fechaFormateada = moment().format('YYYY-MM-DD HH:mm:ss');
            console.log(fechaFormateada);

            let tabla = $('#tablaCategorias').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax":{
                    url:"{{ route('categoria.listar') }}",
                }, 
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                },
                "columns": [
                    { "data": "categoria" },
                    { "data": "estado" },
                    { "data": "updated_at" },
                    { "data": "updated_at" },
                    {
                        "name": "btn",
                        "data": "btn",
                        "orderable": false,
                    },
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "columnDefs": [
                {
                    targets: [2], // Índice de la columna que contiene las fechas
                    render: function (data, type, row) {
                        return moment(data).format('DD-MM-YYYY'); // Puedes ajustar el formato según tus necesidades
                    }
                },  
                {
                    targets: [3], // Índice de la columna que contiene las fechas
                    render: function (data, type, row) {
                        return moment(data).format('DD-MM-YYYY'); // Puedes ajustar el formato según tus necesidades
                    }
                },
                {
                    targets:[1], // Índice de la primera columna
                    render: function (data, type, row) {
                        if (data == 1) {
                            return '<i class="fa fa-check-circle text-success"></i>'; // Icono para el valor 1
                        } else {
                            return '<i class="fa fa-times-circle text-danger"></i>'; // Icono para el valor 0
                        }
                    }
                }
                ],
                
            });

        $("table").on("click",".activar",function(){
            var id = $(this).closest('tr').attr("id");
            $.ajax({
                url: 'categoria/activar/' + id,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    Swal.fire('Activado!', 'La categoría ha sido activada.', 'success');
                    tabla.ajax.reload(); // Actualizar la tabla de categorías si se está utilizando DataTables
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error!', 'Se produjo un error al activar la categoría.', 'error');
                }
            });
        });

        $("table").on("click",".eliminar",function(){
            var id = $(this).closest('tr').attr("id");
            console.log(id);
            Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#26baa5',
                    confirmButtonText: 'Sí, eliminarlo!'
                }).then((result) => {
                    // console.log(result.value);
                    if (result.value) {
                        // Si el usuario confirma la eliminación, ejecutar la solicitud AJAX
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: 'categoria/' + id,
                            type: 'DELETE',
                            data: {
                                _token: token // Agregar el token CSRF como dato de la solicitud
                            },
                            success: function(response) {
                                tabla.ajax.reload();
                                Swal.fire('Eliminado!', 'La categoría ha sido eliminada.', 'success');
                            },
                            error: function(xhr, status, error) {
                                // Manejar cualquier error si es necesario
                                Swal.fire('Error!', 'Se produjo un error al eliminar la categoría.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@stop
