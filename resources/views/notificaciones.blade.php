@extends('layout')

@section('content')

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
    $(document).ready( function () {
        $('#notificacionesTable').DataTable( {
            rowReorder: {
                selector: 'td:nth-child(1)'
            },
            responsive: true
        } );
    } );
</script>

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Bandeja de Entrada</h2>
                    </div>
                    <div class="col-lg-12" style="margin-top:20px">

                    <table class="table" id="notificacionesTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($notificaciones as $noti)
                            @php $fecha = new DateTime();                            
                            @endphp
                            @if (date_diff($noti->created_at, $fecha)->days > 3 && $noti->estado == "Nueva")
                            <tr class="table-danger">
                            @else
                            <tr>
                            @endif
                                <th scope="row">{{ $noti->id }}</th>
                                <td>{{ $noti->titulo }}</td>
                                <td>{{ $noti->solicitante->name }}</td>
                                <td>{{ $noti->created_at }}</td>
                                <td>{{ $noti->estado }}</td>
                                <td>

                                @if ($noti->estado=="Nueva")
                                    <a type="button" href="/notificaciones/actualizar/{{ $noti->id}}/aprobar" class="btn btn-success btn-circle btn-md"><i class="fa fa-check" style="padding-top: 5px;"></i></a>
                                    <a type="button" href="/notificaciones/actualizar/{{ $noti->id}}/pendiente" class="btn btn-info btn-circle btn-md"><i class="fa fa-clock" style="padding-top: 5px;"></i></a>
                                    <a type="button" href="/notificaciones/actualizar/{{ $noti->id}}/rechazar"class="btn btn-danger btn-circle btn-md"><i class="fa fa-times" style="padding-top: 5px;"></i></a>
                                @elseif ($noti->estado=="Pendiente")
                                    <a type="button" href="/notificaciones/actualizar/{{ $noti->id}}/aprobar" class="btn btn-success btn-circle btn-md"><i class="fa fa-check" style="padding-top: 5px;"></i></a>
                                    <a type="button" href="/notificaciones/actualizar/{{ $noti->id}}/rechazar"class="btn btn-danger btn-circle btn-md"><i class="fa fa-times" style="padding-top: 5px;"></i></a>
                                @endif
                                    <a type="button" href="/notificaciones/{{ $noti->id }}" class="btn btn-primary btn-circle btn-md"><i class="fa fa-eye" style="padding-top: 5px;"></i></a>
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
