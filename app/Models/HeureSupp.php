<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeureSupp extends Model
{
    protected $fillable = [
        'date',
        'typeDate',
        'idPersonnel',
        'heureArrivee',
        'heureArrivee1',
        'heureArrivee2',
        'heureArrivee3',
        'heureDepart',
        'heureDepart1',
        'heureDepart2',
        'heureDepart3',
    ];

    public function personnels()
    {
        return $this->belongsTo('App\Personnel', 'idPersonnel', 'id');
    }
}
