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
    ];

    public function items()
    {
        return $this->hasMany('App\Models\RegulationFacturationItem', 'facturation');
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\Commercial_client', 'client');
    }

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site');
    }

}
