<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationConfirmationClient extends Model
{
    protected $table = 'regulation_confirmation_clients';

    protected $fillable = [
        'bordereau',
        'destination',
        'montant',
        'scelle',
        'expediteur',
        'client',
        'destinataire',
        'dateReception',
        'lieu',
        'remarque',
        'confirmation',
        'devise',
        'localisation_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function site()
    {
        return $this->belongsTo('App\Models\SiteDepartTournee', 'bordereau', 'id')
            ->with('sites')->with('tournees');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
