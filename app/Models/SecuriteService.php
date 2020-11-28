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
}
