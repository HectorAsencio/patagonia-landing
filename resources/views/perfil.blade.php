@extends('layout')

@section('content')

<section class="contact-section">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Bienvenido {{Auth::user()->name}}</h2>
            </div>

        </div>
    </div>
    </div>
</section>

@endsection