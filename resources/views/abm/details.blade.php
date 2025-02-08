<?php

use App\Models\User;
use App\Models\Purchase;

/** @var User $user */
/** @var Purchase $purchase */

?>
@extends('layouts.main')

@section('title', 'Detalle de Usuario')

@section('content')

<h1 class="text-control">Información sobre {{ $user->email }}</h1>

<div class="return-panel-container">
    <a href="<?= url("/abm/users");?>" class="return-panel">Volver al Panel</a>
</div>

<h2 class="text-control">Nombre: <span>{{ $user->name }}</span></h2>

<h2 class="text-control">Compras realizadas:</h2>
@if($purchases->count() > 0)
<ul>
    @foreach($purchases as $purchase)
    <li class="text-control">Título: <span>{{ $purchase->service->title }}</span></li>
    <li class="text-control">Precio: <span>{{ $purchase->service->price }}</span></li>
    <li class="text-control">Fecha y hora de compra: <span>{{ $purchase->service->created_at }}</span></li>
    @endforeach
</ul>
@else
<p class="text-control"><span>No hay compras registradas.</span></p>
@endif

@endsection