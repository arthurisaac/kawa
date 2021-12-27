<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelSanction extends Model
{
    protected $fillable = [
        'personnel',
        'avertissement',
        'miseAPied',
        'licenciement',
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
