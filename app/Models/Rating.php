<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //use HasFactory;
    // busca el plural en ingles del singular en este caso rating osea busca ratingS
    // protected $table = 'ratings';
    protected $primaryKey = 'rating_id';
}
