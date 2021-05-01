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
                            <tr>
                                <td style="width:10%"><img src="assets/img/users/user-22.png" style="width:50%"></img></td>
                                <td>Leticia Palazuelos</td>
                                <td>Director</td>
                                <td>+56 9 1111 2222</td>
                                <td>leti@gmail.com</td>
                            </tr>
                            <tr>
                                <td style="width:10%"><img src="assets/img/users/user- (10).png" style="width:50%"></img></td>
                                <td>Kevin Briceño</td>
                                <td>Director</td>
                                <td>+56 9 1133 1122</td>
                                <td>kevin@gmail.com</td>
                            </tr>
                            <tr>
                                <td style="width:10%"><img src="assets/img/users/user-11.png" style="width:50%"></img></td>
                                <td>Hector Ascencio</td>
                                <td>Supervisor</td>
                                <td>+56 9 6611 2233</td>
                                <td>hector@gmail.com</td>
                            </tr>
                            <tr>
                                <td style="width:10%"><img src="assets/img/users/user-16.png" style="width:50%"></img></td>
                                <td>Ignacio Contreras</td>
                                <td>Supervisor</td>
                                <td>+56 9 4441 2221</td>
                                <td>ignacio@gmail.com</td>
                            </tr>
                            <tr>
                                <td style="width:10%"><img src="assets/img/users/user- (3).png" style="width:50%"></img></td>
                                <td>Marcelo Carreño</td>
                                <td>Supervisor</td>
                                <td>+56 9 331 2277</td>
                                <td>marselo@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
    </section>


@endsection

    
    