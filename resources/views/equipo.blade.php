@extends('layout')

@section('content')


<style>
    
    .contact-title {
        font-size: 25px;
        font-weight: 200;
        text-align:center;
    }

    .icon {
        position: relative;
        bottom: 11px
    }

    .mt-100 {
        margin-top: 100px
    }

    .profile img {
        width: 68px;
        height: 68px;
        border-radius: 50%;
    
    }

    .card {
        border-radius: 15px;
        margin-left: 30px;
        margin-right: 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, .2)
    }

    .card-body {
        position: relative;
        bottom: 35px
    }

    .btn {
        
        margin-bottom: 45px;
        background-color: #AB47BC;
        border: none;
        color: #fff
    }

    .btn:hover {
        -webkit-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05);
        color: #fff
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
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Equipo de trabajo</h2>
            </div>
            
        </div>
        <div class="row" style="justify-content: center">
            <div class="card col-md-3 mt-100">
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="profile text-center" > <img src="assets/img/users/default.png"> </div>
                        <br>
                        <div class="card-title"> Leticia Palazuelos<br /> <small>Scrum Master</small> </div>
                        <div class="card-subtitle">
                            <p> <small class="text-muted"> Teléfono: +56 999999999</small> </p>
                            <p> <small class="text-muted"> Email: email@email.com</small> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-3 mt-100">
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="profile text-center" > <img src="assets/img/users/default.png"> </div>
                        <br>
                        <div class="card-title">Hector Asencio<br /> <small>Developer</small> </div>
                        <div class="card-subtitle">
                            <p> <small class="text-muted"> Teléfono: +56 999999999</small> </p>
                            <p> <small class="text-muted"> Email: email@email.com</small> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-3 mt-100">
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="profile text-center" > <img src="assets/img/users/default.png"> </div>
                        <br>
                        <div class="card-title"> Marcelo Carreño<br /> <small>Developer</small> </div>
                        <div class="card-subtitle">
                            <p> <small class="text-muted"> Teléfono: +56 999999999</small> </p>
                            <p> <small class="text-muted"> Email: email@email.com</small> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-3 mt-100">
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="profile text-center" > <img src="assets/img/users/default.png"> </div>
                        <br>
                        <div class="card-title"> Kevin Briceño<br /> <small>Developer</small> </div>
                        <div class="card-subtitle">
                            <p> <small class="text-muted"> Teléfono: +56 999999999</small> </p>
                            <p> <small class="text-muted"> Email: email@email.com</small> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-3 mt-100">
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="profile text-center" > <img src="assets/img/users/default.png"> </div>
                        <br>
                        <div class="card-title"> ignacio Contreras<br /> <small>Developer</small> </div>
                        <div class="card-subtitle">
                            <p> <small class="text-muted"> Teléfono: +56 999999999</small> </p>
                            <p> <small class="text-muted"> Email: email@email.com</small> </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
   
@endsection