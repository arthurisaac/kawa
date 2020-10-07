<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Conteneur;
use Illuminate\Http\Request;

class ConteneurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('transport/conteneur.index',
            compact('centres', 'centres_regionaux'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $conteneurs = Conteneur::all();
        return view('transport/conteneur.liste',
            compact('conteneurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conteneur = new Conteneur([
            'conteneur' => $request->get('conteneur'),
            'typeConteneur' => $request->get('typeConteneur'),
            'dateMiseVie' => $request->get('dateMiseVie'),
            'dureeVie' => $request->get('dureeVie'),
            'etat' => $request->get('etat'),
            'dateDegradation' => $request->get('dateDegradation'),
            'cause' => $request->get('cause'),
            'remplacePar' => $request->get('remplacePar'),
            'remplaceLe' => $request->get('remplaceLe'),
            'dateMaintenanceEffectuee' => $request->get('dateMaintenanceEffectuee'),
            'dateImputation' => $request->get('dateImputation'),
            'dateRenouvellement' => $request->get('dateRenouvellement'),
            'imputationRaport' => $request->get('imputationRaport'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
        ]);
        $conteneur->save();
        return redirect('/conteneur')->with('success', 'Conteneur enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
