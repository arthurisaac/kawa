<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteFacture extends Model
{

    protected $fillable = [
        'numeroFacture',
        'client',
        'periode',
        'montant',
        'dateDepot',
        'dateEcheance',
    ];
}
