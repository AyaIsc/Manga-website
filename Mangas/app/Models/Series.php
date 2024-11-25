<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series'; // Specify the table name for the Serie model
    protected $fillable = ['titre', 'auteur', 'nombre_volumes', 'date_premiere_parution', 'couverture', 'serie_finie'];
    public $timestamps = false; // If the table doesn't have timestamps, set this to false
}
