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

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container" style="max-width: 90%">

        <div class="row">
            <div class="col-12">
                <div class=" col text-right">
                    <h2>Detalle de Notificación</h2>
                </div>
                <h4>Título</h4>
                <li class="list-group-item">{{ $notificacion->titulo}}</li>
                <br>
                <h4>Descripción</h4>
                <li class="list-group-item">{{ $notificacion->descripcion}}</li>
                <br>
                <h5>Datos Adicionales</h5>

                <li class="list-group-item"><strong>Solicitante: </strong>{{ $notificacion->solicitante->name}}</li>
                <li class="list-group-item"><strong>Receptor: </strong>{{ $notificacion->receptor->name}}</li>
                <li class="list-group-item"><strong>Estado: </strong>{{ $notificacion->estado}}</li>
                <li class="list-group-item"><strong>Motivo: </strong>{{ $notificacion->motivo}}</li>
                <li class="list-group-item"><strong>Archivo adjunto: </strong><img style="width:50px" src="/assets/img/elements/pdf.png"> {{ $notificacion->nombreFile}} <a style="padding:15px" type="button" href="{{$notificacion->urlFile}}"class="btn btn-primary"><i style="padding-top: 5px; font-family: 'Poppins',sans-serif; font-weight:300;"> Descargar</i></a></li>
                @if($notificacion->respondido_at == "1900-01-01")
                <li class="list-group-item" style="color:red"><strong>Notificación sin respuesta</strong></li>
                @else
                <li class="list-group-item"><strong>Respondido: </strong>{{ $notificacion->respondido_at}}</li>
                @endif
            </div>
        </div>
        <div>
        
            <div class="col text-center" style="margin-top: 2%;">
                <tr>
                    
                    @if ($notificacion->estado=="Nueva")
                    <p><strong>Acciones:</strong></p>
                    <br>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/aprobar" class="btn btn-success btn-circle btn-md"><i class="fa fa-check" style="padding-top: 5px;"></i></a>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/pendiente" class="btn btn-info btn-circle btn-md"><i class="fa fa-clock" style="padding-top: 5px;"></i></a>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/rechazar" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times" style="padding-top: 5px;"></i></a>
                        @if(Auth::user()->id==$notificacion->solicitante_id)
                        <button id="boton-2eliminar" class="boton-2eliminar btn btn-danger btn-circle btn-md"><i class="fa fa-trash"></i></button>
                        @else
                        @endif
                    @elseif ($notificacion->estado=="Pendiente")
                    <p><strong>Acciones:</strong></p>
                    <br>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/aprobar" class="btn btn-success btn-circle btn-md"><i class="fa fa-check" style="padding-top: 5px;"></i></a>
                    <a type="button" href="/notificaciones/actualizar/{{ $notificacion->id}}/rechazar" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times" style="padding-top: 5px;"></i></a>
                    </td>
                    @endif

                   
                </tr>
            </div>
            <div class="col text-center" style="margin-top:30px;">
            <iframe width="100%" height ="400" src="{{$notificacion->urlFile}}" frameborder="0"></iframe>
            </div>
        </div>
</section>

<script>
    $('.boton-2eliminar').click(function(e) {
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
                window.location = "/eliminar/notificacion/{{ $notificacion->id}}"
            }
        })

    });
</script>

@endsection