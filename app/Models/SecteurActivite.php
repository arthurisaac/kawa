<?php

namespace App\Models;

use App\Models\Localisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SecteurActivite extends Model
{
    protected $fillable = ['localisation_id', 'secteur_activite'];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }
}
