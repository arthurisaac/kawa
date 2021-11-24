<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseCtv extends Model
{
    protected $fillable = [
        'date',
        'operatriceCaisse',
        'numeroBox',
        'heurePriseBox',
        'heureFinBox',
        'tournee',
        'bordereau',
        'convoyeurGarde',
        'regulatrice',
        'securipack',
        'sacjute',
        'nombreColis',
        'numeroScelleColis',
        'montantAnnonce',
        'client',
        'site',
        'expediteur',
        'destinataire',
        'montantReconnu',
        'ecartConstate',
        'montantFinal',
        'billetsCalcules',
        'billetsCalculesMontant',
        'billetsSansValeurs',
        'billetsSansValeursMontant',
        'billetsUsages',
        'billetsUsagesMontant',
        'fauxBillets',
        'fauxBilletsMontant',
        'billetsDeparailles',
        'billetsDeparaillesMontant',
        'centre',
        'centre_regional'
    ];

    public function operatrices()
    {
        return $this->belongsTo('App\Models\CaisseServiceOperatrice', 'operatriceCaisse', 'id')->with("operatrice");
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\Commercial_client', 'client', 'id');
    }

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id');
    }
}
