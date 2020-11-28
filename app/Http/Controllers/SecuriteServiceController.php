<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\SecuriteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SecuriteServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personnels = DB::table('personnels')->where('transport', '!=', null)->get();
        $securiteService = SecuriteService::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('securiteService.create',
            compact('centres', 'centres_regionaux', 'securiteService', 'personnels'));
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
        $securiteService = new SecuriteService([
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'chargeDeSecurite' => $request->get('matriculeChargeDeSecurite'),
            'hps_cs' => $request->get('hps_cs'),
            'hfs_cs' => $request->get('hfs_cs'),
            'eop11' => $request->get('eop11Matricule'),
            'hps_eop11' => $request->get('hps_eop11'),
            'hfs_eop11' => $request->get('hfs_eop11'),
            'eop12' => $request->get('eop12Matricule'),
            'hps_eop12' => $request->get('hps_eop12'),
            'hfs_eop12' => $request->get('hfs_eop12'),
            'eop21' => $request->get('eop21Matricule'),
            'hps_eop21' => $request->get('hps_eop21'),
            'hfs_eop21' => $request->get('hfs_eop21'),
            'eop22' => $request->get('eop22Matricule'),
            'hps_eop22' => $request->get('hps_eop22'),
            'hfs_eop22' => $request->get('hfs_eop22'),
            'eop31' => $request->get('eop31Matricule'),
            'hps_eop31' => $request->get('hps_eop31'),
            'hfs_eop31' => $request->get('hfs_eop31'),
            'eop32' => $request->get('eop32Matricule'),
            'hps_eop32' => $request->get('hps_eop32'),
            'hfs_eop32' => $request->get('hfs_eop32'),
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
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $securiteService = SecuriteService::find($id);
        return view('/securiteService.edit', compact('securiteService','centres', 'centres_regionaux'));
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
        $securiteService = SecuriteService::find($id);
        $securiteService->date = $request->get('date');
        $securiteService->centre = $request->get('centre');
        $securiteService->centreRegional = $request->get('centreRegional');
        $securiteService->nomChargeDeSecurite = $request->get('nomChargeDeSecurite');
        $securiteService->prenomChargeDeSecurite = $request->get('prenomChargeDeSecurite');
        $securiteService->fonctionChargeDeSecurite = $request->get('fonctionChargeDeSecurite');
        $securiteService->matriculeChargeDeSecurite = $request->get('matriculeChargeDeSecurite');
        $securiteService->heureDePriseServiceCs = $request->get('heureDePriseServiceCs');
        $securiteService->csHeureDeFinDeService = $request->get('csHeureDeFinDeService');
        $securiteService->eop11Nom = $request->get('eop11Nom');
        $securiteService->eop11Prenom = $request->get('eop11Prenom');
        $securiteService->eop11Fonction = $request->get('eop11Fonction');
        $securiteService->eop11Matricule = $request->get('eop11Matricule');
        $securiteService->eop11HeurePriseServ = $request->get('eop11HeurePriseServ');
        $securiteService->eop11HeureFinService = $request->get('eop11HeureFinService');
        $securiteService->eop112Nom = $request->get('eop112Nom');
        $securiteService->eop12Prenom = $request->get('eop12Prenom');
        $securiteService->eop12Fonction = $request->get('eop12Fonction');
        $securiteService->eop12Matricule = $request->get('eop12Matricule');
        $securiteService->eop12HeurePriseServ = $request->get('eop12HeurePriseServ');
        $securiteService->eop12HeureFinService = $request->get('eop12HeureFinService');
        $securiteService->eop21Nom = $request->get('eop21Nom');
        $securiteService->eop21Prenom = $request->get('eop21Prenom');
        $securiteService->eop21Fonction = $request->get('eop21Fonction');
        $securiteService->eop21Matricule = $request->get('eop21Matricule');
        $securiteService->eop21HeurePriseServ = $request->get('eop21HeurePriseServ');
        $securiteService->eop21HeureFinService = $request->get('eop21HeureFinService');
        $securiteService->eop22Nom = $request->get('eop22Nom');
        $securiteService->eop22Prenom = $request->get('eop22Prenom');
        $securiteService->eop22Fonction = $request->get('eop22Fonction');
        $securiteService->eop22Matricule = $request->get('eop22Matricule');
        $securiteService->eop22HeurePriseServ = $request->get('eop22HeurePriseServ');
        $securiteService->eop22HeureFinService = $request->get('eop22HeureFinService');
        $securiteService->eop31Nom = $request->get('eop31Nom');
        $securiteService->eop31Prenom = $request->get('eop31Prenom');
        $securiteService->eop31Fonction = $request->get('eop31Fonction');
        $securiteService->eop31Matricule = $request->get('eop31Matricule');
        $securiteService->eop31HeurePriseServ = $request->get('eop31HeurePriseServ');
        $securiteService->eop31HeureFinService = $request->get('eop31HeureFinService');
        $securiteService->eop32Nom = $request->get('eop32Nom');
        $securiteService->eop32Prenom = $request->get('eop32Prenom');
        $securiteService->eop32Fonction = $request->get('eop32Fonction');
        $securiteService->eop32Matricule = $request->get('eop32Matricule');
        $securiteService->eop32HeurePriseServ = $request->get('eop32HeurePriseServ');
        $securiteService->eop32HeureFinService = $request->get('eop32HeureFinService');
        $securiteService->save();

        return redirect('/securite-service-liste')->with('success', 'Enregistrement modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $securiteService = SecuriteService::find($id);
        $securiteService->delete();
        return redirect('/securite-service-liste')->with('success', 'Enregistrement supprimé!');
    }
}
