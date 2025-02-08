<?php
use Illuminate\Support\ViewErrorBag;

/** @var ViewErrorBag $errors */
/** @var Rating[]|Collection $ratings */

?>
@extends('layouts.main')

@section('title', 'Publicar una Nueva Noticia')

@section('content')
<section class="section-create">
    <h1 class="mb-3 h1-action-panel">Nueva Noticia</h1>

    <div class="return-panel-container">
        <a href="<?= url("/abm");?>" class="return-panel">Volver al Panel</a>
    </div>

    @if($errors->any())
    <div class="mb-3 text-danger">Ha ocurrido uno o más errores en la validación. Porfavor, revisa los campos nuevamente.</div>
    @endif

    <form action="{{ url('/abm/process') }}" class="form-panel" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3" class="div-input-label">
            <label for="title" class="form-label">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control"
                maxlength="50"
                value="{{ old('title') }}"
                @error('title')
                aria-describedby="error-title"
                aria-invalid="true"
                @enderror
            >
            @error('title')
            <div class="text-danger" id="error-title">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea
                id="description"
                name="description"
                class="form-control"
                rows="4"
                @error('description')
                aria-describedby="error-description"
                aria-invalid="true"
                @enderror
            >{{ old('description') }}</textarea>
            @error('description')
            <div class="text-danger" id="error-description">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating_id" class="form-label">Clasificacion</label>
            <select 
                id="rating_id" 
                name="rating_id" 
                class="form-control"
            >
                <option value="">Selecciona una Clasificación</option>
                @foreach($ratings as $rating)
                    <option
                        value="{{ $rating->rating_id }}"
                        @selected($rating->rating_id == old('rating_id'))
                    >
                        {{ $rating->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @error('rating_id')
            <div class="text-danger" id="error-rating">{{ $message }}</div>
        @enderror
        
        <div class="mb-3">
            <label for="publication_date" class="form-label">Fecha de publicación</label>
            <input
                type="date"
                id="publication_date"
                name="publication_date"
                class="form-control"
                value="{{ old('publication_date') }}"
            >
            @error('publication_date')
            <div class="text-danger" id="error-date">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Imagen</label>
            <p>No es obligatorio</p>
            <input
                type="file"
                id="file"
                name="file"
                class="form-control"
                value="{{ old('file') }}"
                @error('file')
                aria-describedby="error-file"
                aria-invalid="true"
                @enderror
            >
        </div>

        <div class="button-container button-form-panel">
            <button type="submit">Publicar</button>
        </div>
    </form>
</section>
@endsection