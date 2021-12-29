<?php

namespace App\Http\Controllers;

use App\Models\CaisseService;
use App\Models\CaisseServiceOperatrice;
use App\Models\CaisseVideoSurveillance;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CaisseServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$personnels = DB::table('personnels')->where('caisse', '!=', null)->get();
        $personnels = Personnel::where('service', 'like', 'CAISSE')->orderBy('nomPrenoms')->where('localisation_id', Auth::user()->localisation_id)->get();
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/caisse.service.index',
            compact('personnels', 'centres', 'centres_regionaux', 'clients'));
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
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $service = new CaisseService([
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'chargeCaisse' => $request->get('chargeCaisse'),
            'chargeCaisseHPS' => $request->get('chargeCaisseHPS'),
            'chargeCaisseHFS' => $request->get('chargeCaisseHFS'),
            'chargeCaisseAdjoint' => $request->get('chargeCaisseAdjoint'),
            'chargeCaisseAdjointHPS' => $request->get('chargeCaisseAdjointHPS'),
            'chargeCaisseAdjointHFS' => $request->get('chargeCaisseAdjointHFS'),
        ]);
        $service->save();
        $operatriceCaisse = $request->get('operatriceCaisse');
        $numeroOperatriceCaisse = $request->get('numeroOperatriceCaisse');
        $numeroDeBox = $request->get('operatriceCaisseBox');
        $heureArrivee = $request->get('heureArrivee');
        $heureDepart = $request->get('heureDepart');

        for ($i = 0; $i < count($operatriceCaisse); $i++) {
            if (!empty($operatriceCaisse[$i])) {
                $operatrice = new CaisseServiceOperatrice([
                    'caisseService' => $service->id,
                    'operatriceCaisse' => $operatriceCaisse[$i],
                    'numeroOperatriceCaisse' => $numeroOperatriceCaisse[$i] ?? 0,
                    'operatriceCaisseBox' => $numeroDeBox[$i],
                    'heureArrivee' => $heureArrivee[$i],
                    'heureDepart' => $heureDepart[$i],
                ]);
                $operatrice->save();
            }
        }

        return redirect('/caisse-service-liste')->with('success', 'Service enregistré!');
    }

    public function show($id)
    {
        //
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $services = CaisseService::with('chargeCaisses')->with('chargeCaisseAdjoints')->get();
        if (isset($debut) && isset($fin)) {
            $services = CaisseService::with('chargeCaisses')
                ->whereBetween('date', [$debut, $fin])
                ->with('chargeCaisseAdjoints')->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        return view('/caisse/service.liste',
            compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $personnels = Personnel::where('service', 'like', 'CAISSE')->orderBy('nomPrenoms')->where('localisation_id', Auth::user()->localisation_id)->get();
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $service = CaisseService::with('chargeCaisses')->with('chargeCaisseAdjoints')->where('localisation_id', Auth::user()->localisation_id)->find($id);
        $operatriceCaisses = CaisseServiceOperatrice::with('operatrice')->where("caisseService", $id)->where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/caisse.service.edit',
            compact('personnels', 'centres', 'centres_regionaux', 'clients', 'service', 'operatriceCaisses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $service = CaisseService::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $service->date = $request->get('date');
        $service->centre = $request->get('centre');
        $service->centreRegional = $request->get('centreRegional');
        $service->chargeCaisse = $request->get('chargeCaisse');
        $service->chargeCaisseHPS = $request->get('chargeCaisseHPS');
        $service->chargeCaisseHFS = $request->get('chargeCaisseHFS');
        $service->chargeCaisseAdjoint = $request->get('chargeCaisseAdjoint');
        $service->chargeCaisseAdjointHPS = $request->get('chargeCaisseAdjointHPS');
        $service->chargeCaisseAdjointHFS = $request->get('chargeCaisseAdjointHFS');
        $service->save();

        $idOperatriceCaisse = $request->get('idOperatriceCaisse');
        $operatriceCaisse = $request->get('operatriceCaisse');
        $numeroOperatriceCaisse = $request->get('numeroOperatriceCaisse');
        $numeroDeBox = $request->get('operatriceCaisseBox');

        $heureArrivee = $request->get('heureArrivee');
        $heureDepart = $request->get('heureDepart');

        for ($i = 0; $i < count($idOperatriceCaisse); $i++) {
            if (!empty($idOperatriceCaisse[$i])) {
                $operatrice = CaisseServiceOperatrice::where('localisation_id', Auth::user()->localisation_id)->find($idOperatriceCaisse[$i]);
                $operatrice->operatriceCaisse = $operatriceCaisse[$i];
                $operatrice->numeroOperatriceCaisse = $numeroOperatriceCaisse[$i] ?? 0;
                $operatrice->operatriceCaisseBox = $numeroDeBox[$i];
                $operatrice->heureArrivee = $heureArrivee[$i];
                $operatrice->heureDepart = $heureDepart[$i];
                $operatrice->save();
            } else {
                $operatrice = new CaisseServiceOperatrice([
                    'caisseService' => $service->id,
                    'operatriceCaisse' => $operatriceCaisse[$i],
                    'numeroOperatriceCaisse' => $numeroOperatriceCaisse[$i] ?? 0,
                    'operatriceCaisseBox' => $numeroDeBox[$i],
                    'heureArrivee' => $heureArrivee[$i],
                    'heureDepart' => $heureDepart[$i]
                ]);
                $operatrice->save();
            }
        }
        return redirect('/caisse-service-liste')->with('success', 'Service modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $caisse = CaisseServiceOperatrice::where("caisseService", "=", $id)->where('localisation_id', Auth::user()->localisation_id)->get();
        foreach ($caisse as $item)
        {
            if ($item) {
                $videoSurveillance = CaisseVideoSurveillance::all()->where("operatrice", "=", $item->id);
                foreach ($videoSurveillance as $video) {
                    $video->delete();
                }
                $item->delete();
            }
        }
        $service = CaisseService::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $service->delete();
        //return \response()->json(["message" => "ok"]);
        return redirect('/caisse-service-liste')->with('success', 'Service supprimé!');
    }

    public function destroyItem($id)
    {
        $service = CaisseServiceOperatrice::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $service->delete();
        //return redirect('/caisse-service-liste')->with('success', 'Service supprimé!');
        return \response()->json(["message" => "ok"]);
    }
}
