<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeTransport extends Model
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
