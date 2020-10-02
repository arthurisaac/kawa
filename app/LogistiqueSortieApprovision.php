<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieApprovision extends Model
{
    protected $table = 'logistique_sortie_approvision';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',

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
        return url('/admin/logistique-sortie-approvisions/'.$this->getKey());
    }
}
