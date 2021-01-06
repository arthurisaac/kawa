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
        'montant',
    ];
}
