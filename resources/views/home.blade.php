<?php

use App\Models\Service;

/** @var Service $service */

?>
@extends('layouts.main')

@section('title', 'Inicio')

@section('content')

<section class="home container" id="home">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('status.message'))
        <div class="alert alert-success">
            {{ session('status.message') }}
        </div>
    @endif

    <h1 class="h1-home">¡Experimenta la Emoción de The Last of Us!<span> Compra Ahora y Sumérgete en un Mundo Apasionante</span></h1>
    
    @foreach ($services as $service)
    <div class="card mb-3">
        <img src="{{ $service->imagen_url }}" alt="Imagen {{ $service->title }}">
        <div class="card-body">
            <h2>{{ $service->title }}</h2>

            <p>{{ $service->description }}</p>

            <p><span>Fecha de publicación:</span></p>
            <p>{{ $service->release_date }}</p>

            <p><span>Creador:</span></p>
            <p>{{ $service->creator }}</p>

            <p><span>Compañia:</span></p>
            <p>{{ $service->company }}</p>

            <p><span>Precio:</span></p>
            <p>${{ $service->price }} ARS</p>

            <div class="button-container">
                <button type="submit" id="buy">Comprar</button>
                <form action="{{ url('/cart/add/' . $service->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <button type="submit" id="addToCart{{ $service->id }}">Agregar al carrito</button>
                </form>
            </div>

            
        </div>
    </div>
    @endforeach
</section>
@endsection