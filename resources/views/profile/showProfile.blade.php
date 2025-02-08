@extends('layouts.main')

@section('title', 'Perfil de usuario')

@section('content')

<section class="section-profile">
    <h1 class="h1-home">Perfil de Usuario</h1>

    @if (session('status.message'))
        <div class="alert alert-success profile-alert">
            {{ session('status.message') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success profile-alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger profile-alert">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="div-profile">
        <p class="p-profile">Nombre:<br><span>{{ $user->name }}</span></p>
        <p class="p-profile">Email:<br><span>{{ $user->email }}</span></p>
        <p class="p-profile">Fecha y hora de alta:<br><span>{{ $user->created_at }}</span></p>
    </div>

    <div class="buttons-profile">
        <button><a href="{{ url('/profile/purchases') }}" class="a-profile">Ver mis compras</a></button>
        <button><a href="{{ url('/profile/edit') }}" class="a-profile">Editar mi perfil</a></button>
    </div>
</section>

@endsection