<?php

namespace App\Http\Controllers;

use App\Models\Commercial_site;
use App\Models\Convoyeur;
use App\Models\DepartTournee;
use App\Models\Personnel;
use App\Models\RegulationDepartTournee;
use App\Models\RegulationDepartTourneeItem;
use App\Models\SiteDepartTournee;
use App\Models\VidangeGenerale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegulationArriveeTourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $date = date("Y/m/d");
        $heure = date("H:i");
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        $sites = SiteDepartTournee::with('sites')->get();
        return view('regulation.arrivee-tournee.index', compact("date", "heure", "tournees", "sites"));
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $tournees = DepartTournee::with("sites")->get();
        if (isset($debut) && isset($fin)) {
            $tournees = DepartTournee::with("sites")
                ->whereBetween('date', [$debut, $fin])
                ->get();
        }
        return view("regulation.arrivee-tournee.liste", compact("tournees"));
    }

    public function listeColisArrivee(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $q = $request->get('q');

        $tournees = DepartTournee::all();
        $colisArrivees = SiteDepartTournee::with('sites')
            ->where('colis', '!=', 'RAS')
            ->orderByDesc("created_at")
            ->get();
        if (isset($debut) && isset($fin)) {
            //$colisArrivees = SiteDepartTournee::with('sites')->with('tournees')
            //->whereBetween('created_at', [$debut, $fin])
            //->orderByDesc("created_at")
            //->get();

            $colisArrivees = SiteDepartTournee::where('colis', '!=', 'RAS')->whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->get();
            $tournees = DepartTournee::where('colis', '!=', 'RAS')->whereBetween('date', [$debut, $fin])->get();
        }
        if (isset($q)) {
            $tournees = DepartTournee::where('numeroTournee', 'like', '%' . $q . '%')
                ->orWhere('centre', 'like', '%' . $q . '%')
                ->orWhere('centre_regional', 'like', '%' . $q . '%')
                ->orWhere('kmDepart', 'like', '%' . $q . '%')
                ->orWhere('coutTournee', 'like', '%' . $q . '%')
                ->orWhere('date', 'like', '%' . $q . '%')
                ->get();

        }
        return view('regulation.arrivee-tournee.colis-arrivee',
            compact('colisArrivees', 'tournees'));
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
        $sites = $request->get('site');
        $client = $request->get('client');
        $autre = $request->get('autre');
        $nature = $request->get('nature');
        $nbre_colis = $request->get('nbre_colis');
        $numero_scelle = $request->get('numero_scelle');

        $valeur_colis_xof = $request->get('valeur_colis_xof');
        $device_etrangere_dollar = $request->get('device_etrangere_dollar');
        $device_etrangere_euro = $request->get('device_etrangere_euro');
        $pierre_precieuse = $request->get('pierre_precieuse');

        $site_id = $request->get("site_id");

        $colis = $request->get('colis');
        //$valeur_colis = $request->get('valeur_colis');
        $numero = $request->get('numero');
        //$valeur_autre = $request->get('valeur_autre');
        $dt = DepartTournee::find($request->get("idDepart"));
        $dt->heure_arrivee_regulation = $request->get("heure_arrivee_regulation");
        $dt->save();

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i]) ) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                $dataSite->client = $client[$i] ?? "";
                $dataSite->nature = $nature[$i] ?? "";
                $dataSite->autre = $autre[$i] ?? "";
                $dataSite->nbre_colis_arrivee = $nbre_colis[$i] ?? 0;
                $dataSite->numero_scelle = $numero_scelle[$i] ?? "";
                //$dataSite->montant_regulation = $montant[$i] ?? 0;
                $dataSite->colis = $colis[$i];
                $dataSite->numero = $numero[$i] ?? "";
                //$dataSite->valeur_autre = $valeur_autre[$i];

                $dataSite->valeur_colis_xof_arrivee = $valeur_colis_xof[$i] ?? null;
                $dataSite->device_etrangere_dollar_arrivee = $device_etrangere_dollar[$i] ?? null;
                $dataSite->device_etrangere_euro_arrivee = $device_etrangere_euro[$i] ?? null;
                $dataSite->pierre_precieuse_arrivee = $pierre_precieuse[$i] ?? null;

                $dataSite->save();
            }
        }

        return redirect("/regulation-arrivee-tournee-liste")->with('success', 'Enregistré avec succès');
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
        $tournee = DepartTournee::find($id);
        $tournees = RegulationDepartTournee::all();
        $sites = Commercial_site::with('clients')->get();
        $sitesItems = SiteDepartTournee::all()->where("idTourneeDepart", "=", $id);
        return view('regulation.arrivee-tournee.edit', compact("tournee", "tournees", "sites", "sitesItems"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $sites = $request->get('site');
        $client = $request->get('client');
        $autre = $request->get('autre');
        $nbre_colis = $request->get('nbre_colis');
        $numero_scelle = $request->get('numero_scelle');

        $valeur_colis_xof = $request->get('valeur_colis_xof');
        $device_etrangere_dollar = $request->get('device_etrangere_dollar');
        $device_etrangere_euro = $request->get('device_etrangere_euro');
        $pierre_precieuse = $request->get('pierre_precieuse');



        $colis = $request->get('colis');
        //$valeur_colis = $request->get('valeur_colis');
        $numero = $request->get('numero');
        $nature = $request->get('nature');
        $site_id = $request->get("site_id");

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                $dataSite->client = $client[$i] ?? "";
                $dataSite->autre = $autre[$i] ?? "";
                $dataSite->nbre_colis_arrivee = $nbre_colis[$i] ?? 0;
                $dataSite->numero_scelle = $numero_scelle[$i] ?? "";
                $dataSite->colis = $colis[$i];
                //$dataSite->valeur_colis = $valeur_colis[$i];
                $dataSite->numero = $numero[$i];
                $dataSite->nature = $nature[$i];

                $dataSite->valeur_colis_xof_arrivee = $valeur_colis_xof[$i];
                $dataSite->device_etrangere_dollar_arrivee = $device_etrangere_dollar[$i];
                $dataSite->device_etrangere_euro_arrivee = $device_etrangere_euro[$i];
                $dataSite->pierre_precieuse_arrivee = $pierre_precieuse[$i];

                $dataSite->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré avec succès');
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
