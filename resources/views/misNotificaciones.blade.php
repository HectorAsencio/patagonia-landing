@extends('layout')

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .btn-primary {
        background-color: #4ad0ff !important;

    }

    .btn-primary::before {
        background-color: #4ad0ff !important;
        transition: transform 0s;
    }

    .btn-success {
        background-color: green !important;

    }

    .btn-success::before {
        background-color: green !important;
        transition: transform 0s;
    }

    .btn-info {
        background: #c7c715 !important;
    }

    .btn-info::before {
        background-color: #c7c715 !important;
        transition: transform 0s;
    }

    .btn-danger {
        background: red !important;
    }

    .btn-danger::before {
        background-color: red !important;
        transition: transform 0s;
    }

    .fa {
        font-size: 20px
    }
</style>

<script>
    $(document).ready(function() {
        $('#misNotificacionesTable').DataTable({
            rowReorder: {
                selector: 'td:nth-child(1)'
            },
            responsive: true
        });
    });
</script>

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Mis notificaciones</h2>
                <a href="/notificaciones/crear" class="btn btn-success" style="padding:15px;background-color:#4ad0ff !important">Crear</a>
            </div>
            <div class="col-lg-12" style="margin-top:20px">

                <table class="display nowrap" id="misNotificacionesTable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Receptor</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($notificaciones as $noti)

                        <tr>
                            <th scope="row">{{ $noti->id }}</th>
                            <td>{{ $noti->titulo }}</td>
                            <td>{{ $noti->receptor->name }}</td>
                            <td>{{ $noti->created_at }}</td>
                            <td>{{ $noti->estado }}</td>
                            <td>
                                <a type="button" href="/notificaciones/{{ $noti->id }}" class="btn btn-primary btn-circle btn-md"><i class="fa fa-eye" style="padding-top: 5px;"></i></a>
                                @if($noti->estado=="Nueva")
                                <button id="boton-eliminar" class="boton-eliminar btn btn-danger btn-circle btn-md"><i class="fa fa-trash"></i></button>
                                <script>
                                    $('.boton-eliminar').click(function(e) {
                                        e.preventDefault();
                                        Swal.fire({
                                            title: '¿Estás seguro de eliminar la notificación?',
                                            text: "No podrás recuperarla una vez eliminada",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Si, eliminar.',
                                            cancelButtonText: 'Cancelar',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = "/eliminar/notificacion/{{ $noti->id}}"
                                            }
                                        })
                                    });
                                </script>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

@endsection