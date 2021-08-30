<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionContrats extends Model
{
    protected $fillable = [
        "type_contrat",
        "debut_contrat",
        "fin_contrat",
        "nombre_jours",
        "fonction",
        "salaire",
        "personnel",
    ];
}
