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
                        <form method="POST" action="/api/notificaciones/crear">

                            @csrf

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo')}}</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="titulo"
                                        class="form-control" minlength="4" maxlength="20" name="titulo"
                                        value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción')
                                    }}</label>

                                <div class="col-md-6">
                                    <textarea id="descripcion" type="descripcion" minlength="10" maxlength="200"
                                        class="form-control" name="descripcion"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Solicitante')}}</label>

                                <div class="col-md-6">
                                    <input id="solicitante" type="number"
                                        class="form-control" name="solicitante" required
                                        autocomplete="titulo">
                                </div>
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
