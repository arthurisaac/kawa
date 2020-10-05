<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteReglementFacture extends Model
{
    protected $table = 'comptabilite_reglement_fatures';

    protected $fillable = [
        'facture',
        'date',
        'modeReglement',
        'pieceComptable',
        'montantVerse',
        'montantRestant',

    ];
}
