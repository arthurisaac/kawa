<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComptabiliteEtatController extends Controller
{
    public function clientPeriode()
    {
        return view('comptabilite.etat.client-periode');
    }

    public function facturationClient()
    {
        return view('comptabilite.etat.facturation-client');
    }

    public function facturationGlobale()
    {
        return view('comptabilite.etat.facturation-globale');
    }

    public function fondParClient()
    {
        return view('comptabilite.etat.fond-par-client');
    }

    public function soldeCaisse()
    {
        return view('comptabilite.etat.solde-caisse');
    }

    public function securiteTournee()
    {
        return view('comptabilite.etat.securite-tournee');
    }

    public function tracabilite()
    {
        return view('comptabilite.etat.tracabilite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }
}
