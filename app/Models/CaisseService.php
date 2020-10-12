<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseService extends Model
{
    protected $fillable = [
        'date',
        'centre',
        'centreRegional',
        'chargeCaisse',
        'chargeCaisseHPS',
        'chargeCaisseHFS',
        'chargeCaisseAdjoint',
        'chargeCaisseAdjointHPS',
        'chargeCaisseAdjointHFS',
    ];

    public function chargeCaisses()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeCaisse', 'id');
    }

    public function chargeCaisseAdjoints()
    {
        return $this->belongsTo('App\Personnel', 'chargeCaisseAdjoint', 'id');
    }
}
