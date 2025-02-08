@extends('layouts.main')

@section('title', 'Editar perfil de usuario')

@section('content')

<section class="edit-section">
    <h1 class="h1-home">Edición de perfil</h1>

    <div class="return-panel-container">
        <a href="<?= url("/profile");?>" class="return-panel">Volver al Perfil</a>
    </div>

    <form action="{{ url('/profile/edit/update') }}" method="post" class="edit-form">
        @csrf
        @method('PATCH')
        <div class="div-edit-form">
            <label class="label-form-edit" for="name">Nombre:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="input-form" required>
        </div>
    
        <div class="div-edit-form">
            <label class="label-form-edit" for="email">Correo electrónico:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="input-form" required>
        </div>
    
        <button type="submit">Actualizar Perfil</button>
    </form>
</section>


@endsection