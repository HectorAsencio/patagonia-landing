@extends('layout')

@section('content')

<section class="contact-section">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Bienvenido {{Auth::user()->name}}</h2>
            </div>
            <br>
            <div class="col-12">
                <p class="contact-title" style="font-size: 100%;">¿Necesitas ayuda?</p>
            </div>
            <div id="accordion" style="width: 100%;">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="padding: 15px 5px;">
                                ¿Como responder una notificación?
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            En la vista de sus notificaciones entrantes, podrá ver una lista que indica todas las notificaciones con sus respectivos datos. En este caso es importante ver que el estado de su notificación sea "Nueva", de esta manera tendrá habilitadas las acciones de "Aprobar", "Rechazar" o "Pendiente".
                            <br><br>
                            Los botones para realizar dicha acción son los siguientes:
                            <br><br>
                            <img src="{{asset('assets/img/help/acciones.png')}}" style="width: 100%;">
                            <br><br>
                            Donde el botón verde es para aprobar, el botón amarillo es para dejar pendiente, y el botón rojo es para rechazar.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="padding: 15px 5px;">
                                ¿Cómo crear una notificación?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            En la pestaña de notificaciones debe hacer click en el botón "crear". Posterior a esto se abrirá un formulario que solicitará el título de la notificación, descripción y destinatario que aprobará.
                            <br><br>
                            <img src="{{asset('assets/img/help/crearNotificacion.png')}}" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="padding: 15px 5px;">
                                ¿Como ver a mi equipo?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Para visualizar la información de los integrantes de su equipo de trabajo, debe acceder al menú principal y hacer click en la pestaña "equipo". Luego se despliegará la información correspondiente al equipo de trabajo, nombres, cargos, correo y teléfono.
                            <br><br>
                            <img src="{{asset('assets/img/help/equipo.png')}}" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="padding: 15px 5px;">
                                ¿Como ver una notificación?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Para ver el detalle de una única notificación, debe hacer click en el botón celeste con forma de ojo en su lista principal de notificaciones. Este abrirá el detalle de una única notificación de su lista.
                            <br><br>
                            <img src="{{asset('assets/img/help/detalle1.png')}}" style="width: 100%;">
                            <br><br>
                            <img src="{{asset('assets/img/help/detalle2.png')}}" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>

@endsection