<?php

use App\Models\Cart;

/** @var Cart $cart */

?>

@extends('layouts.main')

@section('title', 'Carrito de compras')

@section('content')

<section class="section-cart">
    <h1 class="h1-home">Carrito de Compras</h1>

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="return-panel-container">
        <a href="<?= url("/");?>" class="return-home">Seguir comprando</a>
    </div>
    
    <ul class="ul-cart">
        @foreach($cartItems as $cart)
        <li>
            <div class="div-cart">
                <div class="sub-div-cart">
                    <img src="{{ $cart->service->imagen_url }}" alt="Imagen {{ $cart->service->title }}" class="img-cart">
                    <p> {{ $cart->service->title }} </p>
                </div>
                <div class="sub-div-cart-2">
                    <p> Precio: <span> ${{ $cart->service->price }} ARS</span> </p>
                    <form action="{{ url('/cart/remove/' . $cart->id ) }}" method="post" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="removeFromCart{{ $cart->id }}" class="button-cart">Eliminar</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    
    <p class="p-cart">Total del carrito: <span> ${{ (new App\Http\Controllers\CartController)->getTotal() }} ARS</span></p>
    
    <div class="div-buttons-cart">
        <form action="{{ url('/cart/clear') }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" id="clearCart" class="clearCart">Vaciar Carrito</button>
        </form>
        <button type="button" id="checkoutBtn" class="a-profile">
            <a href="{{ url('/checkout') }}" class="a-profile">Comprar</a>
        </button>
    </div>
</section>
@endsection