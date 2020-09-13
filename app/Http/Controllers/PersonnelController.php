<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use App\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
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
        return view('/rh/personnel.index',
            compact('centres', 'centres_regionaux'));
    }

    public function liste()
    {
        $personnels = Personnel::all();
        return view('/rh/personnel.liste',
            compact('personnels'));
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
        $personnel = new Personnel([
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'securite' => $request->get('securite'),
            'transport' => $request->get('transport'),
            'caisse' => $request->get('caisse'),
            'regulation' => $request->get('regulation'),
            'siegeService' => $request->get('siegeService'),
            'siegeDirection' => $request->get('siegeDirection'),
            'siegeDirectionGenerale' => $request->get('siegeDirectionGenerale'),
            'nomPrenoms' => $request->get('nomPrenoms'),
            'dateNaissance' => $request->get('dateNaissance'),
            'dateEntreeSociete' => $request->get('dateEntreeSociete'),
            'dateSortie' => $request->get('dateSortie'),
            'typeSortie' => $request->get('typeSortie'),
            'fonction' => $request->get('fonction'),
            'service' => $request->get('service'),
            'natureContrat' => $request->get('natureContrat'),
            'numeroCNPS' => $request->get('numeroCNPS'),
            'situationMatrimoniale' => $request->get('situationMatrimoniale'),
            'nombreEnfants' => $request->get('nombreEnfants'),
            'photo' => base64_encode($request->get('photo')), // TODO
            'adresseGeographique' => $request->get('adresseGeographique'),
            'contactPersonnel' => $request->get('contactPersonnel'),
            'nomPere' => $request->get('nomPere'),
            'nomMere' => $request->get('nomMere'),
            'nomConjoint' => $request->get('nomConjoint'),
            'personneContacter' => $request->get('personneContacter'),
        ]);
        $personnel->save();
        return redirect('/personnel')->with('success', 'Personnel enregistré!');
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
