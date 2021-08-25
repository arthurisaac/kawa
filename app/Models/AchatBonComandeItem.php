<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatBonComandeItem extends Model
{
    protected $fillable = [
        'achat_bon_fk',
        'designation',
        'quantite',
        'prix',
        'tva',
        'montant',
    ];

    public function bons()
    {
        return $this->belongsTo('App\Models\AchatBonComande', 'achat_bon_fk', 'id');
    }
}
