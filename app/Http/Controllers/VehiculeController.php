<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Vehicule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicule = Vehicule::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('transport/vehicule.index',
            compact('vehicule','centres', 'centres_regionaux'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $vehicules = Vehicule::all();
        return view('transport/vehicule.liste', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $vehicule = new Vehicule([
            'immatriculation' => $request->get('immatriculation'),
            'photo' => base64_encode($request->get('photo')), // TODO
            'marque' => $request->get('marque'),
            'type' => $request->get('type'),
            'code' => $request->get('code'),
            'num_chassis' => $request->get('num_chassis'),
            'DPMC' => $request->get('DPMC'),
            'dateAcquisition' => $request->get('dateAcquisition'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'chauffeurTitulaireNom' => $request->get('chauffeurTitulaireNom'),
            'chauffeurTitulairePrenom' => $request->get('chauffeurTitulairePrenom'),
            'chauffeurTitulaireDateAffection' => $request->get('chauffeurTitulaireDateAffection'),
            'chauffeurTitulaireFonction' => $request->get('chauffeurTitulaireFonction'),
            'chauffeurTitulaireMatricule' => $request->get('chauffeurTitulaireMatricule'),
            'chauffeurSuppleantNom' => $request->get('chauffeurSuppleantNom'),
            'chauffeurSuppleantPrenom' => $request->get('chauffeurSuppleantPrenom'),
            'chauffeurSuppleantFonction' => $request->get('chauffeurSuppleantFonction'),
            'chauffeurSuppleantMatricule' => $request->get('chauffeurSuppleantMatricule'),
            'chauffeurSuppleantDateAffection' => $request->get('chauffeurSuppleantDateAffection'),
        ]);
        $vehicule->save();
        return redirect('/vehicule')->with('success', 'Véhicule enregistré!');
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
