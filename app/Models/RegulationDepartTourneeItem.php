<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationDepartTourneeItem extends Model
{
    protected $fillable = [
        'regulation_depart',
        'site',
        'client',
        'nature',
        'nbre_colis',
        'numero_scelle',
        'montant',
        'localisation_id',
    ];

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id')
            ->with('clients');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
