<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieSecuripack extends Model
{
    protected $table = 'logistique_sortie_securipack';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',
        'reference',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'debutSerie',
        'finSerie',
        'date',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/logistique-sortie-securipacks/'.$this->getKey());
    }
}
