<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\DepartTournee;
use App\Models\OptionDevise;
use App\Models\RegulationDepartTournee;
use App\Models\RegulationDepartTourneeItem;
use App\Models\SiteDepartTournee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RegulationDepartTourneeController extends Controller
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
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->orderByDesc('id')->get();
        // $sites = DB::table('site_depart_tournees')
        // ->where('type', 'Enlèvement / R')
        // ->orWhere('type', "Enlèvement + Dépôt / R")
        // ->orWhere('type', "Dépôt / R")
        // ->get();
        $sites = SiteDepartTournee::with('sites')->where('type', 'Enlèvement / R')->orWhere('type', "Dépôt / R")->orWhere('type', 'Enlèvement + Dépôt / R')->get();
        // dd($sites);

        $devises = OptionDevise::all();
        return view("regulation.depart-tournee.index", compact("date", "heure", "tournees", "sites", "devises"));
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $tournees = DepartTournee::with("sites")->orderByDesc("id")->get();
        if (isset($debut) && isset($fin)) {
            $tournees = DepartTournee::with("sites")
                ->whereBetween('date', [$debut, $fin])
                ->get();

        }
        return view("regulation.depart-tournee.liste", compact("tournees"));
    }

    public function listeColisDepart(Request $request)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients = Commercial_client::orderBy('client_nom')->get();
        $sites_com = Commercial_site::orderBy('site')->get();
        $devises = OptionDevise::all();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $client = $request->get("client");
        $site = $request->get("site");
        $nature = $request->get("nature");
        $devise = $request->get("devise");

        $debut = $request->get("debut");
        $fin = $request->get("fin");

        $tournees = DepartTournee::all();
        $colisArrivees = SiteDepartTournee::with('sites')
            ->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })
            ->orderByDesc("created_at")
            ->get();

        if (isset($debut) && isset($fin) )
        {
            $colisArrivees = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }
        if (isset($centre_regional)) {
            $colisArrivees = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($centre_regional) {
                $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }
        if (isset($centre)) {
            $colisArrivees = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($centre) {
                $query->where('centre', 'like', '%' . $centre . '%');
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }
        if (isset($client)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($client) {
                $query->where('client', 'like', '%' . $client . '%');
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }
        if (isset($site)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($site) {
                $query->where('id', 'like', '%' . $site . '%');
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }
        if (isset($nature)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($nature) {
                $query->where('nature', 'like', '%' . $nature . '%');
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }

        if (isset($debut) && isset($fin) && isset($site)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->where(function(Builder $query) {
                    $query->Where('type', 'Enlèvement / R')
                        ->orWhere('type', "Dépôt / R")
                        ->orWhere('type', 'Enlèvement + Dépôt / R');
                })
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.site', 'like', '%' . $site . '%')
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($client)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($client) {
                $query->where('client', 'like', '%' . $client . '%');
            })->whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })->get();
        }

        if (isset($debut) && isset($fin) && isset($devise)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.regulation_depart_devise', 'like', '%' . $devise . '%')
                ->where(function(Builder $query) {
                    $query->Where('type', 'Enlèvement / R')
                        ->orWhere('type', "Dépôt / R")
                        ->orWhere('type', 'Enlèvement + Dépôt / R');
                })
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($colis)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.colis', 'like', '%' . $colis . '%')
                ->where(function(Builder $query) {
                    $query->Where('type', 'Enlèvement / R')
                        ->orWhere('type', "Dépôt / R")
                        ->orWhere('type', 'Enlèvement + Dépôt / R');
                })
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($site) && isset($centre) && isset($centre_regional)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.site', 'like', '%' . $site . '%')
                ->where('depart_tournees.centre_regional', 'like', '%' . $centre_regional . '%')
                ->where('depart_tournees.centre', 'like', '%' . $centre . '%')
                ->where(function(Builder $query) {
                    $query->Where('type', 'Enlèvement / R')
                        ->orWhere('type', "Dépôt / R")
                        ->orWhere('type', 'Enlèvement + Dépôt / R');
                })
                ->get();
        }

        return view('regulation.depart-tournee.colis-depart',
            compact('colisArrivees', 'tournees', 'centres', 'centres_regionaux', 'clients', 'centre', 'centre_regional', 'site', 'client', 'sites_com',
                'debut', 'fin', 'devises', 'nature', 'devise'));
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
        //$client = $request->get('client');
        //$nature = $request->get('nature');
        //$autre = $request->get('autre');
        //$numero_scelle = $request->get('numero_scelle');
        // $montant = $request->get('montant');
        //$valeur_colis = $request->get('valeur_colis');
        //$valeur_autre = $request->get('valeur_autre');

        $sites = $request->get('site');
        $nbre_colis = $request->get('nbre_colis');
        $site_id = $request->get("site_id");
        $colis = $request->get('colis');
        $numero = $request->get('numero');

        $regulation_depart_devise = $request->get('regulation_depart_devise');
        $regulation_depart_valeur_colis = $request->get('regulation_depart_valeur_colis');
        //$valeur_colis_xof = $request->get('valeur_colis_xof');
        //$device_etrangere_dollar = $request->get('device_etrangere_dollar');
        //$device_etrangere_euro = $request->get('device_etrangere_euro');
        //$pierre_precieuse = $request->get('pierre_precieuse');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                //$dataSite->client = $client[$i] ?? "";
                //$dataSite->nature = $nature[$i] ?? "";
                //$dataSite->autre = $autre[$i];
                //$dataSite->numero_scelle = $numero_scelle[$i];
                //$dataSite->montant_regulation = $montant[$i] ?? 0;
                //$dataSite->valeur_colis = $valeur_colis[$i];
                //$dataSite->valeur_autre = $valeur_autre[$i];
                $dataSite->numero = $numero[$i];
                $dataSite->nbre_colis = $nbre_colis[$i];
                $dataSite->colis = $colis[$i];

                //$dataSite->valeur_colis_xof = str_replace(' ', '',$valeur_colis_xof[$i]);
                //$dataSite->device_etrangere_dollar = str_replace(' ', '', $device_etrangere_dollar[$i]);
                //$dataSite->device_etrangere_euro = str_replace(' ', '', $device_etrangere_euro[$i]);
                //$dataSite->pierre_precieuse = str_replace(' ', '', $pierre_precieuse[$i]);
                $dataSite->regulation_depart_devise = str_replace(' ', '', $regulation_depart_devise[$i]);
                $dataSite->regulation_depart_valeur_colis = str_replace(' ', '', $regulation_depart_valeur_colis[$i]);

                $dataSite->save();
            }
        }

        return redirect("/regulation-depart-tournee-liste")->with('success', 'Enregistré avec succès');

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
        $tournee = DepartTournee::find($id);
        $tournees = RegulationDepartTournee::all();
        $sites = Commercial_site::with('clients')->get();
        //$sitesItems = SiteDepartTournee::where("idTourneeDepart", "=", $id)->Where('type', 'Enlèvement / R')->orWhere('type', "Dépôt / R")->orWhere('type', 'Enlèvement + Dépôt / R')->get();
        $sitesItems = SiteDepartTournee::with('sites')
            ->where("idTourneeDepart", "=", $id)
            ->where(function(Builder $query) {
                $query->Where('type', 'Enlèvement / R')
                    ->orWhere('type', "Dépôt / R")
                    ->orWhere('type', 'Enlèvement + Dépôt / R');
            })
            ->get();
        $devises = OptionDevise::all();
        return view('regulation.depart-tournee.edit', compact("tournee", "tournees", "sites", "sitesItems", "devises"));
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
        $sites = $request->get('site');
        $nbre_colis = $request->get('nbre_colis');
        $colis = $request->get('colis');
        $numero = $request->get('numero');
        $site_id = $request->get("site_id");

        $regulation_depart_devise = $request->get('regulation_depart_devise');
        $regulation_depart_valeur_colis = $request->get('regulation_depart_valeur_colis');

        //$valeur_colis_xof = $request->get('valeur_colis_xof');
        //$device_etrangere_dollar = $request->get('device_etrangere_dollar');
        //$device_etrangere_euro = $request->get('device_etrangere_euro');
        //$pierre_precieuse = $request->get('pierre_precieuse');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                $dataSite->nbre_colis = $nbre_colis[$i];
                $dataSite->colis = $colis[$i];
                $dataSite->numero = $numero[$i];
                $dataSite->regulation_depart_devise = str_replace(' ', '', $regulation_depart_devise[$i]);
                $dataSite->regulation_depart_valeur_colis = str_replace(' ', '', $regulation_depart_valeur_colis[$i]);

                //$dataSite->valeur_colis_xof = $valeur_colis_xof[$i];
                //$dataSite->device_etrangere_dollar = $device_etrangere_dollar[$i];
                //$dataSite->device_etrangere_euro = $device_etrangere_euro[$i];
                //$dataSite->pierre_precieuse = $pierre_precieuse[$i];

                $dataSite->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré avec succès');
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
