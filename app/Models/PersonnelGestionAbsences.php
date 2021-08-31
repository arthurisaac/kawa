<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionAbsences extends Model
{
    protected $fillable = [
        "debut_absence",
        "fin_absence",
        "nombre_jours",
        "motif",
        "personnel"
    ];
}
