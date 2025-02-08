<?php

use App\Models\Notice;

/** @var Notice $notice */

?>

@extends('layouts.main')

@section('title', 'Panel Administrador')

@section('content')

@if (session('status.message'))
    <div class="alert alert-success">
        {{ session('status.message') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h1 class="h1-panel">Panel Administrador</h1>

<div class="button-container">
    <button type="submit"><a href="{{ url('/abm/users') }}" class="btn">Control de usuarios</a></button>
</div>

<h2 class="text-control">Control de Noticias</h2>

<div class="button-container">
    <button type="submit"><a href="{{ url('/abm/create') }}" class="btn">Publicar una Nueva Noticia</a></button>
</div>

<div class="table-responsive">
    <table class="table table-dark table-striped text-control">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha de publicacion</th>
                <th>Clasificación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $notice)
            <tr>
                <td>{{ $notice->news_id }}</td>
                <td>{{ $notice->title }}</td>
                <td>{{ $notice->description }}</td>
                <td>{{ $notice->publication_date }}</td>
                <td>{{ $notice->rating->name }}</td>
                <td class="buttons-cta">
                    <form action="{{ url('/abm/edit/' . $notice->news_id) }}" method="GET">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-success">Modificar</button>
                    </form>
                    
                    <form action="{{ url('/abm/delete/' . $notice->news_id . '/process') }}" method="GET">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<h2 class="text-control">Control de Estadísticas</h2>

<div class="dashboards-buttons">
    <button type="submit"><a href="{{ url('/abm/dashboard/services') }}" class="btn">Juegos</a></button>
    <button type="submit"><a href="{{ url('/abm/dashboard/users') }}" class="btn">Usuarios</a></button>
</div>

@endsection