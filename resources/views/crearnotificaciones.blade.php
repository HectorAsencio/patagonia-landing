@extends('layout')

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
    <section class="contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Nueva Notificacion</h2>
                    </div>
                    <div class="col-lg-12">

                    <form method="POST">
                        <label>Titulo<label>
                        <input id=titulo> </input>
                        <label>Descripcion<label>
                        <input id= descripcion>
                        <label>Receptor<label>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($notificaciones as $noti)

                            <tr>
                                <th scope="row">{{ $noti->id }}</th>
                                <td>{{ $noti->descripcion }}</td>
                                <td>{{ $noti->solicitante }}</td>
                                <td>{{ $noti->created_at }}</td>
                                <td>{{ $noti->estado }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-circle btn-md"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-info btn-circle btn-md"><i class="fa fa-clock"></i></button>
                                    <button type="button" class="btn btn-danger btn-circle btn-md"><i class="fa fa-times"></i></button>
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