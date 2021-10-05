<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeGenerale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            'idVehicule' => $request->get('idVehicule_generale'),
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
        //return redirect('/vidange-generale')->with('success', 'Véhicule enregistré!');
        return redirect()->back()->with('success', 'Enregistrement effectué!');

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
        $vehicules = Vehicule::all();
        $vidange = VidangeGenerale::find($id);
        return view('transport.entretien-vehicule.vidange-generale.edit', compact('vehicules', 'vidange'));
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
        $vidangeGenerale = VidangeGenerale::find($id);
        $vidangeGenerale->kmActuel = $request->get('kmActuel');
        $vidangeGenerale->prochainKm = $request->get('prochainKm');
        $vidangeGenerale->huileMoteur = $request->get('huileMoteur');
        $vidangeGenerale->huileMoteurMarque = $request->get('huileMoteurMarque');
        $vidangeGenerale->huileMoteurKm = $request->get('huileMoteurKm');
        $vidangeGenerale->huileMoteurFournisseur = $request->get('huileMoteurFournisseur');
        $vidangeGenerale->huileMoteurmontant = $request->get('huileMoteurmontant');
        $vidangeGenerale->filtreHuile = $request->get('filtreHuile');
        $vidangeGenerale->filtreHuileMontant = $request->get('filtreHuileMontant');
        $vidangeGenerale->filtreGazoil = $request->get('filtreGazoil');
        $vidangeGenerale->filtreGazoilMontant = $request->get('filtreGazoilMontant');
        $vidangeGenerale->filtreAir = $request->get('filtreAir');
        $vidangeGenerale->filtreAirMontant = $request->get('filtreAirMontant');
        $vidangeGenerale->autresConsommables = $request->get('autresConsommables');
        $vidangeGenerale->autresConsommablesMontant = $request->get('autresConsommablesMontant');

        $vidangeGenerale->save();
        return redirect()->back()->with('success', 'Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vidange = VidangeGenerale::find($id);
        $vidange->delete();
        return redirect('/vidange-generale')->with('success', 'Enregistrement supprimé!');
    }
}
