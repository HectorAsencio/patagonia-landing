@extends('layout')

@section('content')

<style>
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

                <div class="card">
                    <div class="card-header">{{ __('Crea tu notificacion') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/notificaciones/crear" enctype="multipart/form-data">

                            @csrf
                            @if(Session::has('datosIncorrectosMsg'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosMsg')}}</strong></p><br>
                            @endif
                            @if(Session::has('datosIncorrectosTitulo'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosTitulo')}}</strong></p><br>
                            @endif
                            @if(Session::has('datosIncorrectosAsunto'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosAsunto')}}</strong></p><br>
                            @endif
                            @if(Session::has('datosIncorrectosAsuntoMax'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosAsuntoMax')}}</strong></p><br>
                            @endif
                            @if(Session::has('datosIncorrectosReceptor'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosReceptor')}}</strong></p><br>
                            @endif
                            @if(Session::has('pdfIncorrectosMsg'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('pdfIncorrectosMsg')}}</strong></p><br>
                            @endif

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo')}}</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="titulo" class="form-control @error('titulo') is-invalid @enderror" minlength="4" maxlength="20" name="titulo" required value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción')
                                    }}</label>

                                <div class="col-md-6">
                                    <textarea id="descripcion" type="descripcion" minlength="10" maxlength="200" class="form-control @error('password') is-invalid @enderror" name="descripcion" required required></textarea>
                                </div>
                            </div>

                            <!-- Archivo -->
                            <div class="form-group">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Archivo adjunto')}}</label>
                                <input type="file" name="upload" required />
                            </div>

                            <div class="form-group row">
                                <label for="receptor" class="col-md-4 col-form-label text-md-right">{{ __('Receptor')}}</label>

                                <div class="col-md-6">
                                    <select id="receptor" name="receptor" required>
                                        <option value="Elegir">Elegir...</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection