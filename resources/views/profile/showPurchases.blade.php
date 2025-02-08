<?php

use App\Models\Purchase;

/** @var Purchase $purchase */

?>

@extends('layouts.main')

@section('title', 'Compras de usuario')

@section('content')

<section class="purchase-section">
    <h1 class="text-control">Compras realizadas:</h1>

    <div class="return-panel-container">
        <a href="<?= url("/profile");?>" class="return-panel">Volver al Perfil</a>
    </div>

    @forelse($userPurchases as $userPurchase)
        <ul class="ul-purchase">
            <li class="text-control">Título:<br><span>{{ $userPurchase->service->title }}</span></li>
            <li class="text-control">Precio:<br><span>${{ $userPurchase->service->price }} ARS</span></li>
            <li class="text-control">Fecha y hora de compra:<br><span>{{ $userPurchase->service->created_at }}</span></li>
        </ul>
    @empty
        <p class="text-control"><span>No has adquirido juegos.</span></p>
    @endforelse

    <div class="return-panel-container-purchase">
        <button><a href="<?= url("/");?>" class="button-go-purchase">Quiero comprar</a></button>
    </div>

</section>

@endsection