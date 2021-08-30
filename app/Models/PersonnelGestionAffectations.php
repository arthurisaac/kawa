<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionAffectations extends Model
{
    protected $fillable = [
        "date_affectation",
        "centre",
        "motif",
        "personnel",
    ];
}
