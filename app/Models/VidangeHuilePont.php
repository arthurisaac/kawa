<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeHuilePont extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'kmActuel',
        'prochainKm',
    ];
}
