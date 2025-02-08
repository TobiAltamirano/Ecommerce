<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // use HasFactory;

    // Configuramos el nombre de la tabla.
    protected $table = "services";

    // Configuramos el nombre de la PK.
    protected $primaryKey = "id";

    protected $fillable = ["title", "description", "imagen_url", "release_date", "creators", "company", "price"];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_services', 'service_id', 'user_id')
            ->withTimestamps(); // Si tienes campos de marca de tiempo en tu tabla pivot
    }
}
