@extends('layoutUser')

@section('content')

<style>
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
    <section class="contact-section" style="margin-top:200px">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Notificaciones</h2>
                    </div>
                    <div class="col-lg-12">

                    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- REPETIR INFINITO -->
        <tr>
            <th scope="row">1</th>
            <td>Notificacion numero uno.</td>
            <td>02-05-2021</td>
            <td>14:00</td>
            <td>Inicial</td>
            <td>
                <button type="button" class="btn btn-success btn-circle btn-md"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-info btn-circle btn-md"><i class="fa fa-clock"></i></button>
                <button type="button" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <!-- REPETIR INFINITO -->
        <!-- REPETIR INFINITO -->
        <tr>
            <th scope="row">2</th>
            <td>Notificacion numero dos.</td>
            <td>02-05-2021</td>
            <td>14:00</td>
            <td>Inicial</td>
            <td>
                <button type="button" class="btn btn-success btn-circle btn-md"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-info btn-circle btn-md"><i class="fa fa-clock"></i></button>
                <button type="button" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <!-- REPETIR INFINITO -->
        <!-- REPETIR INFINITO -->
        <tr>
            <th scope="row">3</th>
            <td>Notificacion numero tres.</td>
            <td>02-05-2021</td>
            <td>14:00</td>
            <td>Rechazado</td>
            <td>
                <button type="button" disabled class="btn btn-success btn-circle btn-md"><i class="fa fa-check"></i></button>
                <button type="button" disabled class="btn btn-info btn-circle btn-md"><i class="fa fa-clock"></i></button>
                <button type="button" disabled class="btn btn-danger btn-circle btn-md"><i class="fa fa-times"></i></button>
            </td>
        </tr>
        <!-- REPETIR INFINITO -->
    </tbody>
</table>

                    </div>
                </div>
            </div>
    </section>


@endsection

    
    