<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionExplications extends Model
{
    protected $fillable = [
        "date_demande",
        "motif",
        "sanctions",
        "personnel"
    ];
}
