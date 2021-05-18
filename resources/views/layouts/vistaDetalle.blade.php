@extends('layout')

@section('content')

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container" style="max-width: 55%">

        <div class="row">
            <div class="col-12">
                <div class=" col text-right">
                <h2 >Detalle de Notificacion</h2>
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
</section>

@endsection