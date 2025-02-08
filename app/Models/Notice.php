<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    // use HasFactory;

    // Configuramos el nombre de la tabla.
    protected $table = "news";

    // Configuramos el nombre de la PK.
    protected $primaryKey = "news_id";

    protected $fillable = ["title", "description", "publication_date", "imagen_url", "rating_id"];

    public const VALIDATION_RULES = [
        'title' => 'required|min:2',
        'description' => 'required',
        'publication_date' => 'required',
        'rating_id' => 'required|exists:ratings',
    ];    

    public const VALIDATION_MESSAGES = [
        'title.required' => 'El título no puede quedar vacío.',
        'title.min' => 'El título debe tener al menos :min caracteres.',
        'description.required' => 'La descripción no puede quedar vacía.',
        'publication_date.required' => 'La fecha de publicación no puede quedar vacía.',
        'rating_id.required' => 'Debes seleccionar una clasificación',
        'rating_id.required' => 'La clasificación seleccionada no es válida.',
    ];

    public function rating(){
        // Pasamos por parametro el FQN, nombre de foreing key y owner key
        return $this->belongsTo(Rating::class, 'rating_id', 'rating_id');
    }
}
