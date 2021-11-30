<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuriteService extends Model
{
    //
    protected $fillable = [
        'date',
        'centre',
        'centreRegional',
        'chargeDeSecurite',
        'hps_cs',
        'hfs_cs',
        'eop11',
        'hps_eop11',
        'hfs_eop11',
        'eop12',
        'hps_eop12',
        'hfs_eop12',
        'eop21',
        'hps_eop21',
        'hfs_eop21',
        'eop22',
        'hps_eop22',
        'hfs_eop22',
        'eop31',
        'hps_eop31',
        'hfs_eop31',
        'eop32',
        'hps_eop32',
        'hfs_eop32',
    ];

    public function chargeDeSecurites()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeDeSecurite', 'id');
    }

    public function personnes()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeDeSecurite', 'id');
    }

    public function eop11s()
    {
        return $this->belongsTo('App\Models\Personnel', 'eop11', 'id');
    }

    public function eop12s()
    {
        return $this->belongsTo('App\Models\Personnel', 'eop12', 'id');
    }

    public function eop21s()
    {
        return $this->belongsTo('App\Models\Personnel', 'eop21', 'id');
    }

    public function eop31s()
    {
        return $this->belongsTo('App\Models\Personnel', 'eop31', 'id');
    }

    public function eop32s()
    {
        return $this->belongsTo('App\Models\Personnel', 'eop32', 'id');
    }

    public function eop22s()
    {
        return $this->belongsTo('App\Models\Personnel', 'eop22', 'id');
    }
}
