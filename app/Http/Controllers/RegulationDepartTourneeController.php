<?php

namespace App\Http\Controllers;

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
