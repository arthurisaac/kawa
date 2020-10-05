<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Virgilometrie extends Model
{
    protected $table = 'virgilometries';

    protected $fillable = [
        'date',
        'nomPrenoms',
        'heureArrivee',
        'typePiece',
        'personneVisitee',
        'motif',
        'heureDepart',
        'observation',
        'photo',

    ];
}
