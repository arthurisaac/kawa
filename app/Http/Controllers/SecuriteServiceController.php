<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\SecuriteService;

class SecuriteServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $securiteService = SecuriteService::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('securiteService.create',
            compact('centres', 'centres_regionaux', 'securiteService'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $securiteServices = SecuriteService::all();
        return view('securiteService.liste', compact('securiteServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('securiteService.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'centre' => 'centre',
            'centreRegional' => 'centreRegional'
        ]);*/
        $securiteService = new SecuriteService([
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'nomChargeDeSecurite' => $request->get('nomChargeDeSecurite'),
            'prenomChargeDeSecurite' => $request->get('prenomChargeDeSecurite'),
            'fonctionChargeDeSecurite' => $request->get('fonctionChargeDeSecurite'),
            'matriculeChargeDeSecurite' => $request->get('matriculeChargeDeSecurite'),
            'heureDePriseServiceCs' => $request->get('heureDePriseServiceCs'),
            'csHeureDeFinDeService' => $request->get('csHeureDeFinDeService'),
            'eop11Nom' => $request->get('eop11Nom'),
            'eop11Prenom' => $request->get('eop11Prenom'),
            'eop11Fonction' => $request->get('eop11Fonction'),
            'eop11Matricule' => $request->get('eop11Matricule'),
            'eop11HeurePriseServ' => $request->get('eop11HeurePriseServ'),
            'eop11HeureFinService' => $request->get('eop11HeureFinService'),
            'eop112Nom' => $request->get('eop112Nom'),
            'eop12Prenom' => $request->get('eop12Prenom'),
            'eop12Fonction' => $request->get('eop12Fonction'),
            'eop12Matricule' => $request->get('eop12Matricule'),
            'eop12HeurePriseServ' => $request->get('eop12HeurePriseServ'),
            'eop12HeureFinService' => $request->get('eop12HeureFinService'),
            'eop21Nom' => $request->get('eop21Nom'),
            'eop21Prenom' => $request->get('eop21Prenom'),
            'eop21Fonction' => $request->get('eop21Fonction'),
            'eop21Matricule' => $request->get('eop21Matricule'),
            'eop21HeurePriseServ' => $request->get('eop21HeurePriseServ'),
            'eop21HeureFinService' => $request->get('eop21HeureFinService'),
            'eop22Nom' => $request->get('eop22Nom'),
            'eop22Prenom' => $request->get('eop22Prenom'),
            'eop22Fonction' => $request->get('eop22Fonction'),
            'eop22Matricule' => $request->get('eop22Matricule'),
            'eop22HeurePriseServ' => $request->get('eop22HeurePriseServ'),
            'eop22HeureFinService' => $request->get('eop22HeureFinService'),
            'eop31Nom' => $request->get('eop31Nom'),
            'eop31Prenom' => $request->get('eop31Prenom'),
            'eop31Fonction' => $request->get('eop31Fonction'),
            'eop31Matricule' => $request->get('eop31Matricule'),
            'eop31HeurePriseServ' => $request->get('eop31HeurePriseServ'),
            'eop31HeureFinService' => $request->get('eop31HeureFinService'),
            'eop32Nom' => $request->get('eop32Nom'),
            'eop32Prenom' => $request->get('eop32Prenom'),
            'eop32Fonction' => $request->get('eop32Fonction'),
            'eop32Matricule' => $request->get('eop32Matricule'),
            'eop32HeurePriseServ' => $request->get('eop32HeurePriseServ'),
            'eop32HeureFinService' => $request->get('eop32HeureFinService'),
        ]);
        $securiteService->save();

        return redirect('/securite-service')->with('success', 'Service enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('securiteService.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $securiteService = SecuriteService::find($id);
        return view('securiteService.edit', compact('securiteService'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
