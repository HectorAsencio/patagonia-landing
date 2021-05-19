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

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container" style="max-width: 55%">

        <div class="row">
            <div class="col-12">
                <div class=" col text-right">
                    <h2>Detalle de Notificacion</h2>
                </div>
                <h4>Título</h4>
                <li class="list-group-item">{{ $notificacion->titulo}}</li>
                <br>
                <h4>Descripcion</h4>
                <li class="list-group-item">{{ $notificacion->descripcion}}</li>
                <br>
                <h5>Datos Adicionales</h5>

                <li class="list-group-item"><strong>Solicitante: </strong>{{ $notificacion->solicitante_id}}</li>
                <li class="list-group-item"><strong>Receptor: </strong>{{ $notificacion->receptor_id}}</li>
                <li class="list-group-item"><strong>Estado: </strong>{{ $notificacion->estado}}</li>
                <li class="list-group-item"><strong>Motivo: </strong>{{ $notificacion->motivo}}</li>
                <li class="list-group-item"><strong>Respondido: </strong>{{ $notificacion->respondido_at}}</li>
            </div>
        </div>
        <div>
        @if ($notificacion->estado=="Nueva")
            <div class="col text-center" style="margin-top: 2%;">
                <tr>
                    <p><strong>Acciones:</strong></p>
                    <br>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/aprobar" class="btn btn-success btn-circle btn-md"><i class="fa fa-check" style="padding-top: 5px;"></i></a>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/pendiente" class="btn btn-info btn-circle btn-md"><i class="fa fa-clock" style="padding-top: 5px;"></i></a>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/rechazar" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times" style="padding-top: 5px;"></i></a>
                    </td>
                </tr>
            </div>
        @endif
        </div>
</section>

@endsection