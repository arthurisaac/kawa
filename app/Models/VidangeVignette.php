<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeVignette extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'dateRenouvellement',
        'prochainRenouvellement',
        'montant'];
}
