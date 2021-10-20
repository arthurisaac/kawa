<?php

namespace App\Http\Controllers;

use App\Models\Commercial_site;
use App\Models\DepartTournee;
use App\Models\RegulationDepartTournee;
use App\Models\RegulationDepartTourneeItem;
use App\Models\SiteDepartTournee;
use Illuminate\Http\Request;

class RegulationDepartTourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date("Y/m/d");
        $heure = date("H:i");
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        $sites = SiteDepartTournee::with('sites')->get();
        return view("regulation.depart-tournee.index", compact("date", "heure", "tournees", "sites"));
    }


    public function liste()
    {
        $tournees = DepartTournee::with("sites")->get();
        return view("regulation.depart-tournee.liste", compact("tournees"));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sites = $request->get('site');
        $client = $request->get('client');
        //$nature = $request->get('nature');
        $autre = $request->get('autre');
        $nbre_colis = $request->get('nbre_colis');
        $numero_scelle = $request->get('numero_scelle');
        // $montant = $request->get('montant');
        $site_id = $request->get("site_id");

        $colis = $request->get('colis');
        //$valeur_colis = $request->get('valeur_colis');
        $numero = $request->get('numero');
        //$valeur_autre = $request->get('valeur_autre');

        $valeur_colis_xof = $request->get('valeur_colis_xof');
        $device_etrangere_dollar = $request->get('device_etrangere_dollar');
        $device_etrangere_euro = $request->get('device_etrangere_euro');
        $pierre_precieuse = $request->get('pierre_precieuse');


        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($client[$i]) && !empty($nbre_colis[$i]) && !empty($nbre_colis[$i]) ) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                $dataSite->client = $client[$i] ?? "";
                //$dataSite->nature = $nature[$i] ?? "";
                $dataSite->autre = $autre[$i] ?? "";
                $dataSite->nbre_colis = $nbre_colis[$i] ?? 0;
                $dataSite->numero_scelle = $numero_scelle[$i] ?? "";
                //$dataSite->montant_regulation = $montant[$i] ?? 0;
                $dataSite->colis = $colis[$i];
                //$dataSite->valeur_colis = $valeur_colis[$i];
                $dataSite->numero = $numero[$i];
                //$dataSite->valeur_autre = $valeur_autre[$i];

                $dataSite->valeur_colis_xof = $valeur_colis_xof[$i];
                $dataSite->device_etrangere_dollar = $device_etrangere_dollar[$i];
                $dataSite->device_etrangere_euro = $device_etrangere_euro[$i];
                $dataSite->pierre_precieuse = $pierre_precieuse[$i];

                $dataSite->save();
            }
        }

        return redirect("/regulation-depart-tournee-liste")->with('success', 'Enregistré avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tournee = DepartTournee::find($id);
        $tournees = RegulationDepartTournee::all();
        $sites = Commercial_site::with('clients')->get();
        $sitesItems = SiteDepartTournee::all()->where("idTourneeDepart", "=", $id);
        return view('regulation.depart-tournee.edit', compact("tournee", "tournees", "sites", "sitesItems"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sites = $request->get('site');
        $client = $request->get('client');
        $autre = $request->get('autre');
        $nbre_colis = $request->get('nbre_colis');
        $numero_scelle = $request->get('numero_scelle');

        $colis = $request->get('colis');
        //$valeur_colis = $request->get('valeur_colis');
        $numero = $request->get('numero');
        //$valeur_autre = $request->get('valeur_autre');
        $site_id = $request->get("site_id");

        $valeur_colis_xof = $request->get('valeur_colis_xof');
        $device_etrangere_dollar = $request->get('device_etrangere_dollar');
        $device_etrangere_euro = $request->get('device_etrangere_euro');
        $pierre_precieuse = $request->get('pierre_precieuse');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($client[$i]) && !empty($nbre_colis[$i]) && !empty($nbre_colis[$i])) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                $dataSite->client = $client[$i] ?? "";
                $dataSite->autre = $autre[$i] ?? "";
                $dataSite->nbre_colis = $nbre_colis[$i] ?? 0;
                $dataSite->numero_scelle = $numero_scelle[$i] ?? "";
                $dataSite->colis = $colis[$i];
                //$dataSite->valeur_colis = $valeur_colis[$i];
                $dataSite->numero = $numero[$i] ?? "";
                //$dataSite->valeur_autre = $valeur_autre[$i];

                $dataSite->valeur_colis_xof = $valeur_colis_xof[$i];
                $dataSite->device_etrangere_dollar = $device_etrangere_dollar[$i];
                $dataSite->device_etrangere_euro = $device_etrangere_euro[$i];
                $dataSite->pierre_precieuse = $pierre_precieuse[$i];

                $dataSite->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
