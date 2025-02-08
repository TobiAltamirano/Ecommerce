<?php

use App\Models\Notice;

/** @var Notice $notice */

?>
@extends('layouts.main')

@section('title', 'Eliminar noticia')

@section('content')
<section class="section-delete">
    <h1 class="mb-3 h1-action-panel">Confirmación para eliminar la noticia "{{ $notice->title }}"</h1>

    <p class="mb-2 text-delete">Estás por eliminar la siguiente noticia, y es necesario una confirmación para hacerlo.</p>

    <div class="return-panel-container">
        <a href="<?= url("/abm");?>" class="return-panel">Volver al Panel</a>
    </div>

    <hr>

    <article class="table-styles">
        <h2 class="mb-3 text-delete">{{ $notice->title }}</h2>

        <div class="text-delete">
            <div>
                <dl>
                    <dt>Descripción</dt>
                    <dd>{{ $notice->description }}</dd>
                    <dt>Fecha de publicación</dt>
                    <dd>{{ $notice->publication_date }}</dd>
                </dl>
            </div>
            <div>
                @if($notice->imagen_url !== null)
                    <img src="{{ asset('storage/' . $notice->imagen_url) }}" alt=" Imagen Noticia - {{ $notice->title }}" class="image-delete">
                @else
                    No se ha encontrado la imagen, puede que haya habido un error al cargarla. Porfavor, vuelve a intentarlo.
                @endif
            </div>
        </div>
    </article>

    <hr>

    <h2 class="mb-3 text-delete">Confirmación</h2>

    <p class="mb-2 text-delete">¿Querés eliminar este registro?</p>

    <form action="{{ url('/abm/delete/' . $notice->news_id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="button-container button-form-panel">
            <button type="submit">Eliminar</button>
        </div>
    </form>
</section>
@endsection