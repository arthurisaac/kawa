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

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id')
            ->with("clients");
    }
}
