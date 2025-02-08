<?php

use App\Models\Notice;

/** @var Notice $notice */

?>

@extends('layouts.main')

@section('title', 'Noticias')

@section('content')
<h1 class="h1-news">Noticias y novedades, <span>¡No te pierdas de nada!</span></h1>

<section class="section-news">

<div class="news-container">
  <div class="col">
    
@foreach ($news as $notice)
    <div class="card">
      @if($notice->imagen_url !== null)
        <img src="{{ asset('storage/' . $notice->imagen_url) }}" alt="Imagen Noticia - {{$notice->title }}" class="card-img-top">
      @else
        No se ha encontrado la imagen, puede que haya habido un error al cargarla. Porfavor, vuelve a intentarlo.
      @endif
      <div class="card-body">
        <h2 class="card-title">{{ $notice->title }}</h2>
        <p class="card-text">{{ $notice->description }}</p>

        <p class="card-text"><span>Fecha de publicación</span></p>
        <p class="card-text">{{ $notice->publication_date }}</p>

        <p class="card-text"><span>Clasificación de la Noticia:</span></p>
        <p class="card-text">{{ $notice->rating->name }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
</section>
@endsection