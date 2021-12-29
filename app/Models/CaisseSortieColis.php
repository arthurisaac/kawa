<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseSortieColis extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'centre',
        'centre_regional',
        'observation',
        'totalMontant',
        'totalColis',
        'noTournee',
        'receveur',
        'localisation_id',
    ];

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id')
            ->with('vehicules')
            ->with('agentDeGardes')
            ->with('chauffeurs')
            ->with('chefDeBords');
    }

    public function sites()
    {
        return $this->hasMany('App\Models\SiteDepartTournee', 'idTourneeDepart');
    }


    public function items()
    {
        return $this->hasMany('App\Models\CaisseSortieColisItem', 'sortieColis');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
