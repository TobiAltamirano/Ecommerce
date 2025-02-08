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
                <h1 class="h1-login">¡Crea tu cuenta!</h1>
                <h2 class="h2-login">Registrate y se parte de nuestra comunidad</h2>
            </div>
            <div>
                <form method="POST" action="{{ url('/register/process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <label for="name" class="label-form">Nombre:</label>
                    <input type="name" id="name" name="name" class="input-form">

                    <label for="email" class="label-form">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="input-form" required>

                    <label for="password" class="label-form">Contraseña:</label>
                    <input type="password" id="password" name="password" class="input-form" required>
                    
                    <a type="button" id="togglePassword" class="show-password">Mostrar Contraseña</a>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const passwordInput = document.getElementById('password');
                            const togglePasswordButton = document.getElementById('togglePassword');
                            
                            togglePasswordButton.addEventListener('click', function () {
                                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordInput.setAttribute('type', type);

                            // Cambia el texto del botón
                            togglePasswordButton.textContent = type === 'password' ? 'Mostrar Contraseña' : 'Ocultar Contraseña';
                            });
                        });
                    </script>

                    <div class="button-container">
                        <button type="submit" class="login-button">Registrarme</button>
                    </div>
                </form>
            </div>
        </div>
    </article>
</section>
@endsection