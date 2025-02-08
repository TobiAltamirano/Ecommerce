@extends('layouts.main')

@section('title', 'Compra Exitosa')

@section('content')
<section class="section-back-urls">
    <h1 class="h1-home">¡Muchas gracias por tu compra!</h1>
    
    <p class="p-profile">El pago se ha realizado con éxito, ya puedes disfrutar de tu juego</p>

    <div class="return-panel-container">
        <a href="<?= url("/");?>" class="return-panel">Volver a Inicio</a>
    </div>

    <div class="div-image-back-url">
        <img src="{{ asset('success.jpg') }}" class="img-fluid" alt="Imagen de éxito Ellie y Joel">
    </div>
</section>

@endsection