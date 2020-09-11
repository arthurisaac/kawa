<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VidangeHuilePont extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'centre',
        'centreRegional',
        'kmActuel',
        'prochainKm',
        'huilePont',
        'huilePontMarque',
        'huilePontKm',
        'huilePontFournisseur',
        'huilePontmontant'];
}
