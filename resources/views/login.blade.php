@extends('layout')

@section('content')

    <!-- ================ contact section start ================= -->
    <section class="contact-section" style="margin-top:200px">
            <div class="container" style="max-width: 400px;">

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Iniciar sesión</h2>
                    </div>
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="/login" method="POST" novalidate="novalidate">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="Email...">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control valid" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contraseña'" placeholder="Contraseña...">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mt-3" style="margin-top:0px !important">
                                        <button type="submit" class="button btn-block button-contactForm boxed-btn">Entrar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->



@endsection