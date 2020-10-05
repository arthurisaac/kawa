<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeStationnement extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'centre',
        'centreRegional',
        'dateRenouvellement',
        'prochainRenouvellement',
        'montant'];
}
