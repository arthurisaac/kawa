<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeCourroie extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'centre',
        'centreRegional',
        'kmActuel',
        'prochainKm',
        'courroie',
        'courroieMarque',
        'courroieKm',
        'courroieFournisseur',
        'courroieMontant'];
}
