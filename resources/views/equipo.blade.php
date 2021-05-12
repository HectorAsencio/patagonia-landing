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
                        <h2 class="contact-title">Equipo de trabajo</h2>
                    </div>
                    <div class="col-lg-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Avatar</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($team as $usuario)

                            <tr>
                                <td style="width:10%"><img src="assets/img/users/{{$usuario->avatar}}" style="width:50%"></img></td>
                                <td>{{$usuario->nombre}}</td>
                                <td>{{$usuario->cargo}}</td>
                                <td>{{$usuario->telefono}}</td>
                                <td>{{$usuario->email}}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
    </section>


@endsection

    
    