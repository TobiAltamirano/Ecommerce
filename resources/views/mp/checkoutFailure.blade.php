@extends('layouts.main')

@section('title', 'Realizar Pago - Mercado Pago')

@section('content')
<section class="section-back-urls">
    <h1 class="h1-home">Ocurrió un error al realizarse el pago</h1>
    
    <p class="p-profile">El pago ha sido rechazado, por favor, intentalo de nuevo a la brevedad</p>

    <div class="return-panel-container">
        <a href="<?= url("/checkout");?>" class="return-panel">Volver a Intentar</a>
    </div>

    <div class="div-image-back-url">
        <img src="{{ asset('failure.jpg') }}" class="img-fluid" alt="Imagen de éxito Ellie y Joel">
    </div>
</section>

@endsection