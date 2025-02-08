@extends('layouts.main')

@section('title', 'Realizar Pago - Mercado Pago')

@section('content')
<section class="section-back-urls">
    <h1 class="h1-home">¡Aguarda un momento!</h1>
    
    <p class="p-profile">El pago aun está pendiente a realizarse...</p>

    <div class="return-panel-container">
        <a href="<?= url("/");?>" class="return-panel">Volver a Inicio</a>
    </div>

    <div class="div-image-back-url">
        <img src="{{ asset('pending.jpeg') }}" class="img-fluid" alt="Imagen de Señal de Stop con Logo de Luciernagas The Last Of Us">
    </div>
</section>


@endsection