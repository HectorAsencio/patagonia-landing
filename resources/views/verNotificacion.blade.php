@extends('layout')

@section('content')

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container" style="max-width: 55%">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Notificación # {{ $notificacion->id }}</h2>
            </div>
            <div class="col-lg-12" style="margin-top:20px">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Título: </strong>{{ $notificacion->titulo}}</li>
                    <li class="list-group-item"><strong>Solicitante: </strong>{{ $notificacion->solicitante_id}}</li>
                    <li class="list-group-item"><strong>Receptor: </strong>{{ $notificacion->receptor_id}}</li>
                    <li class="list-group-item"><strong>Descripcion: </strong>{{ $notificacion->descripcion}}</li>
                    <li class="list-group-item"><strong>Estado: </strong>{{ $notificacion->estado}}</li>
                    <li class="list-group-item"><strong>Motivo: </strong>{{ $notificacion->motivo}}</li>
                    <li class="list-group-item"><strong>Respondido: </strong>{{ $notificacion->respondido_at}}</li>
                </ul>
                <div class="col-md-12">
                    <div class="form-group mt-3" style="margin-top:10% !important">
                        <a href="/notificaciones"><button type="button" class="button btn-block button-contactForm boxed-btn">Volver</button></a>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection