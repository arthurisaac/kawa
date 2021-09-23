<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseEntreeColisItem extends Model
{
    protected $fillable = [
        "entree_colis",
        "site",
        "autre",
        "nature",
        "scelle",
        "nbre_colis",
        "montant",
    ];
}
