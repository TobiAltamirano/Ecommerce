<?php

use App\Models\User;

/** @var User $user */

?>

@extends('layouts.main')

@section('title', 'Panel Administrador')

@section('content')

<h1 class="h1-panel">Panel Administrador - Usuario</h1>

<div class="button-container">
    <button type="submit"><a href="{{ url('/abm/') }}" class="btn">Control de Noticias</a></button>
</div>

<h2 class="text-control">Control de usuarios</h2>

<div class="table-responsive">
    <table class="table table-dark table-striped text-control">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="buttons-cta">
                    <form action="{{ url('/abm/user/' . $user->id . '/details') }}" method="GET">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-primary">Detalles</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection