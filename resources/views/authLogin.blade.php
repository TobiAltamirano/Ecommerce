<?php
use Illuminate\Support\ViewErrorBag;

/** @var ViewErrorBag $errors */

?>
@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('content')
<section class="section-auth">
    @if (session('status.message'))
        <div class="alert alert-success">
            {{ session('status.message') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <article class="login">
        <div class="login-form">
            <div>
                <h1 class="h1-login">¡Bienvenido!</h1>
                <h2 class="h2-login">Inicia sesión en tu cuenta para continuar</h2>
            </div>
            <div>
                <form action="{{ url('/iniciar-sesion') }}" method="post">
                    @csrf
                    @method('POST')

                    <label for="email" class="label-form">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="input-form" value="{{ old('email') }}">

                    <label for="password" class="label-form">Contraseña:</label>
                    <input type="password" id="password" name="password" class="input-form">

                    <div class="button-container">
                        <button type="submit" class="login-button">Ingresar</button>
                    </div>

                    <p class="warning" role="alert"> ¿No tienes una cuenta?</p>
                    <p class="warning" role="alert"> <a href="{{ url('/register') }}" class="link">Crear cuenta</a></p>
                </form>
            </div>
        </div>
    </article>
</section>
@endsection