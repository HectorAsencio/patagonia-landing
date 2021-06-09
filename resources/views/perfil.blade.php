@extends('layout')

@section('content')

<section class="contact-section">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Datos perfil: {{Auth::user()->name}}</h2>
            </div>
        </div>

        <div class="bd-example">
            <form method="POST" action="/users/update">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">Email</label>
                        <input type="email" class="form-control" id="validationServer02" placeholder="Email" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServerUsername">Nombre</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                            </div>
                            <input type="text" class="form-control" name="name" placeholder="Nombre" aria-describedby="inputGroupPrepend3" value="{{Auth::user()->name}}" required>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer03">Teléfono</label>
                        <input type="text" class="form-control" placeholder="+56 9 .... ...." value="{{Auth::user()->telefono}}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer04">Cargo</label>
                        <input type="text" class="form-control" placeholder="Cargo..." value="{{Auth::user()->cargo}}" disabled>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Actualizar datos</button>
            </form>
        </div>

        <div class="row" style="margin-top: 40px;">
            <div class="col-12">
                <h2 class="contact-title">Cambio de avatar</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <a href="/perfil/avatar/default.png">
                    <img src="{{asset('assets/img/users/default.png')}}" style="width: 100%;">
                </a>
            </div>
            <div class="col-lg-2">
                <a href="/perfil/avatar/user-(1).png">
                    <img src="{{asset('assets/img/users/user-(1).png')}}" style="width: 100%;">
                </a>
            </div>
            <div class="col-lg-2">
                <a href="/perfil/avatar/user-(2).png">
                    <img src="{{asset('assets/img/users/user-(2).png')}}" style="width: 100%;">
                </a>
            </div>
            <div class="col-lg-2">
                <a href="/perfil/avatar/user-(3).png">
                    <img src="{{asset('assets/img/users/user-(3).png')}}" style="width: 100%;">
                </a>
            </div>
            <div class="col-lg-2">
                <a href="/perfil/avatar/user-(4).png">
                    <img src="{{asset('assets/img/users/user-(4).png')}}" style="width: 100%;">
                </a>
            </div>
            <div class="col-lg-2">
                <a href="/perfil/avatar/user-(5).png">
                    <img src="{{asset('assets/img/users/user-(5).png')}}" style="width: 100%;">
                </a>
            </div>
        </div>



    </div>

</section>

@endsection