<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationFacturation extends Model
{
    protected $table = 'regulation_facturations';

    protected $fillable = [
        'date',
        'numero',
        'centre',
        'centre_regional',
        'montantTotal',
        'client',
        'type',
        'site',
        'localisation_id',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\RegulationFacturationItem', 'facturation');
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\Commercial_client', 'client');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
