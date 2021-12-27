<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseBilletage extends Model
{
    protected $fillable = [
        'ctv',
        'ba_nb10000',
        'ba_nb5000',
        'ba_nb2000',
        'ba_nb1000',
        'ba_nb500',
        'ba_nb250',
        'ba_nb200',
        'ba_nb100',
        'ba_nb50',
        'ba_nb25',
        'ba_nb10',
        'ba_nb5',
        'ba_nb1',
        'br_nb10000',
        'br_nb5000',
        'br_nb2000',
        'br_nb1000',
        'br_nb500',
        'br_nb250',
        'br_nb200',
        'br_nb100',
        'br_nb50',
        'br_nb25',
        'br_nb10',
        'br_nb5',
        'br_nb1',
        'localisation_id',
    ];

    public function ctv()
    {
        return $this->belongsTo('App\Models\CaisseCtv', 'ctv', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
