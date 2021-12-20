<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseCTVOperatrice extends Model
{
    protected $table = 'caisse_cvts_operatrices';
    protected $fillable = [
        'ctv',
        'operatrice',
        'numero',
        'localisation_id',
    ];

    public function operatrices()
    {
        return $this->belongsTo('App\Models\CaisseServiceOperatrice', 'operatrice', 'id')->with('operatrice');
    }
}
