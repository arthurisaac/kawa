<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\SecuriteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        $personnels = DB::table('personnels')->where('service', 'LIKE', "securite")->orderBy('nomPrenoms')->where('localisation_id', Auth::user()->localisation_id)->get();
        $securiteService = SecuriteService::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('securiteService.create',
            compact('centres', 'centres_regionaux', 'securiteService', 'personnels'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $securiteServices = SecuriteService::with('personnes')
            ->orderByDesc('id')
            ->get();
        if (isset($debut) && isset($fin)) {
            $securiteServices = SecuriteService::with('personnes')
                ->whereBetween('date', [$debut, $fin])
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
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

        // return redirect('/securite-service')->with('success', 'Service enregistré!');
        return redirect('/securite-service-liste')->with('success', 'Service enregistré!');
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
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $securiteService = SecuriteService::with('chargeDeSecurites')->where('localisation_id', Auth::user()->localisation_id)->get()->find($id);
        $personnels = DB::table('personnels')->where('transport', '!=', null)->where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/securiteService.edit', compact('securiteService','centres', 'centres_regionaux', 'personnels'));
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
        $securiteService = SecuriteService::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $securiteService->date = $request->get('date');
        $securiteService->centre = $request->get('centre');
        $securiteService->centreRegional = $request->get('centreRegional');
        $securiteService->chargeDeSecurite = $request->get('matriculeChargeDeSecurite');
        $securiteService->hps_cs = $request->get('hps_cs');
        $securiteService->hfs_cs = $request->get('hfs_cs');
        $securiteService->eop11 = $request->get('eop11');
        $securiteService->hps_eop11 = $request->get('hps_eop11');
        $securiteService->hfs_eop11 = $request->get('hfs_eop11');
        $securiteService->eop12 = $request->get('eop12');
        $securiteService->hps_eop12 = $request->get('hps_eop12');
        $securiteService->hfs_eop12 = $request->get('hfs_eop12');
        $securiteService->eop21 = $request->get('eop21');
        $securiteService->hps_eop21 = $request->get('hps_eop21');
        $securiteService->hfs_eop21 = $request->get('hfs_eop21');
        $securiteService->eop22 = $request->get('eop22');
        $securiteService->hps_eop22 = $request->get('hps_eop22');
        $securiteService->hfs_eop22 = $request->get('hfs_eop22');
        $securiteService->eop31 = $request->get('eop31');
        $securiteService->hps_eop31 = $request->get('hps_eop31');
        $securiteService->hfs_eop31 = $request->get('hfs_eop31');
        $securiteService->eop32 = $request->get('eop32');
        $securiteService->hps_eop32 = $request->get('hps_eop32');
        $securiteService->hfs_eop32 = $request->get('hfs_eop32');
        $securiteService->save();

        return redirect('/securite-service-liste')->with('success', 'Enregistrement modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $securiteService = SecuriteService::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $securiteService->delete();
        //return redirect('/securite-service-liste')->with('success', 'Enregistrement supprimé!');
        return \response()->json(["message", "supprimé"]);
    }
}
