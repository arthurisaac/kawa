<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Personnel;
use App\Models\PersonnelConge;
use App\Models\PersonnelSanction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnels = Personnel::all();
        $nextId = DB::table('personnels')->max('id') + 1;
        return view('/rh/personnel.index',
            compact('centres', 'centres_regionaux', 'personnels', 'nextId'));
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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $personnel = new Personnel([
            'matricule' => $request->get('matricule'),
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
        if (!empty($request->get('nombreJourPris'))) {
            $conges = new PersonnelConge([
                'personnel' => $personnel->id,
                'dateDernierDepartConge' => $request->get('dateDernierDepartConge'),
                'dateProchainDepartConge' => $request->get('dateProchainDepartConge'),
                'nombreJourPris' => $request->get('nombreJourPris'),
                'nombreJourRestant' => $request->get('nombreJourRestant'),
            ]);
            $conges->save();
        }
        if (!empty($request->get('avertissement') || !empty($request->get('miseAPied')) || !empty($request->get('licenciement')))) {
            $sanctions = new PersonnelSanction([
                'personnel' => $personnel->id,
                'avertissement' => $request->get('avertissement'),
                'miseAPied' => $request->get('miseAPied'),
                'licenciement' => $request->get('licenciement')
            ]);
            $sanctions->save();
        }

        return redirect('/personnel')->with('success', 'Personnel enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnel = Personnel::find($id);
        return view('/rh/personnel.edit', compact('personnel', 'centres', 'centres_regionaux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $photo = null;// TODO

        $personnel = Personnel::find($id);
        $personnel->centre = $request->get('centre');
        $personnel->centreRegional = $request->get('centreRegional');
        $personnel->securite = $request->get('securite');
        $personnel->transport = $request->get('transport');
        $personnel->caisse = $request->get('caisse');
        $personnel->regulation = $request->get('regulation');
        $personnel->siegeService = $request->get('siegeService');
        $personnel->siegeDirection = $request->get('siegeDirection');
        $personnel->siegeDirectionGenerale = $request->get('siegeDirectionGenerale');
        $personnel->nomPrenoms = $request->get('nomPrenoms');
        $personnel->dateNaissance = $request->get('dateNaissance');
        $personnel->dateEntreeSociete = $request->get('dateEntreeSociete');
        $personnel->dateSortie = $request->get('dateSortie');
        $personnel->typeSortie = $request->get('typeSortie');
        $personnel->fonction = $request->get('fonction');
        $personnel->service = $request->get('service');
        $personnel->natureContrat = $request->get('natureContrat');
        $personnel->numeroCNPS = $request->get('numeroCNPS');
        $personnel->situationMatrimoniale = $request->get('situationMatrimoniale');
        $personnel->nombreEnfants = $request->get('nombreEnfants');
        $personnel->photo = $photo;
        $personnel->adresseGeographique = $request->get('adresseGeographique');
        $personnel->contactPersonnel = $request->get('contactPersonnel');
        $personnel->nomPere = $request->get('nomPere');
        $personnel->nomMere = $request->get('nomMere');
        $personnel->nomConjoint = $request->get('nomConjoint');
        $personnel->personneContacter = $request->get('personneContacter');
        $personnel->save();
        return redirect('/personnel-liste')->with('success', 'Personnel enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        return redirect('/personnel-liste')->with('success', 'Personnel supprimé!');
    }
}
