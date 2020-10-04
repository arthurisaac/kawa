<?php

namespace App;

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

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'dateReception',

    ];

}
