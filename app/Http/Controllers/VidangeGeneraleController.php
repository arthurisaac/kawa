<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\VidangeGenerale;

class VidangeGeneraleController extends Controller
{
    /**
     * Display form of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $vidanges = VidangeGenerale::all();
        return view('/transport/entretien-vehicule/vidange-generale.index',
            compact('vehicules', 'centres', 'centres_regionaux', 'vidanges'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $vehicules = Vehicule::all();
        return view('/transport/entretien-vehicule/vidange-generale.liste', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $vidangeGenerale = new VidangeGenerale([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'kmActuel' => $request->get('kmActuel'),
            'prochainKm' => $request->get('prochainKm'),
            'huileMoteur' => $request->get('huileMoteur'),
            'huileMoteurMarque' => $request->get('huileMoteurMarque'),
            'huileMoteurKm' => $request->get('huileMoteurKm'),
            'huileMoteurFournisseur' => $request->get('huileMoteurFournisseur'),
            'huileMoteurmontant' => $request->get('huileMoteurmontant'),
            'filtreHuile' => $request->get('filtreHuile'),
            'filtreHuileMontant' => $request->get('filtreHuileMontant'),
            'filtreGazoil' => $request->get('filtreGazoil'),
            'filtreGazoilMontant' => $request->get('filtreGazoilMontant'),
            'filtreAir' => $request->get('filtreAir'),
            'filtreAirMontant' => $request->get('filtreAirMontant'),
            'autresConsommables' => $request->get('autresConsommables'),
            'autresConsommablesMontant' => $request->get('autresConsommablesMontant'),
        ]);
        $vidangeGenerale->save();
        return redirect('/vidange-generale')->with('success', 'Véhicule enregistré!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
