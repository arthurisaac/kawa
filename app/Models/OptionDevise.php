<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionDevise extends Model
{
    protected $table = 'option_devise';

    protected $fillable = [
        'devise',
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
