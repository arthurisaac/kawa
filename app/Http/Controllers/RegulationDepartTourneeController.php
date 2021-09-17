<?php

namespace App\Http\Controllers;

use App\Models\Commercial_site;
use App\Models\DepartTournee;
use App\Models\RegulationDepartTournee;
use App\Models\RegulationDepartTourneeItem;
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
        $sites = Commercial_site::with('clients')->get();
        return view("regulation.depart-tournee.index", compact("date", "heure", "tournees", "sites"));
    }


    public function liste()
    {
        $tournees = RegulationDepartTournee::all();
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
        $data = new RegulationDepartTournee([
            'date' => $request->get("date"),
            'heure' => $request->get("heure"),
            'noTournee' => $request->get("noTournee"),
            'totalMontant' => $request->get("totalMontant"),
            'totalColis' => $request->get("totalColis"),
        ]);
        $data->save();

        $sites = $request->get('site');
        $client = $request->get('client');
        $nature = $request->get('nature');
        $nbre_colis = $request->get('nbre_colis');
        $numero_scelle = $request->get('numero_scelle');
        $montant = $request->get('montant');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($client[$i]) && !empty($nbre_colis[$i]) && !empty($nbre_colis[$i]) && !empty($montant[$i])) {
                $dataSite = new RegulationDepartTourneeItem([
                    'regulation_depart' => $data->id,
                    'site' => $sites[$i] ?? 0,
                    'client' => $client[$i] ?? "",
                    'nature' => $nature[$i] ?? "",
                    'nbre_colis' => $nbre_colis[$i] ?? 0,
                    'numero_scelle' => $numero_scelle[$i] ?? "",
                    'montant' => $montant[$i] ?? 0,
                ]);
                $dataSite->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré avec succès');

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
        $tournee = RegulationDepartTournee::find($id);
        $tournees = RegulationDepartTournee::all();
        $sites = Commercial_site::with('clients')->get();
        $sitesItems = RegulationDepartTourneeItem::all()->where("regulation_depart", "=", $id);
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
        $data = RegulationDepartTournee::find($id);
        $data->noTournee = $request->get("noTournee");
        $data->totalMontant = $request->get("totalMontant");
        $data->totalColis = $request->get("totalColis");
        $data->save();

        $sites = $request->get('site');
        $client = $request->get('client');
        $nature = $request->get('nature');
        $nbre_colis = $request->get('nbre_colis');
        $numero_scelle = $request->get('numero_scelle');
        $montant = $request->get('montant');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($client[$i]) && !empty($nbre_colis[$i]) && !empty($nbre_colis[$i]) && !empty($montant[$i])) {
                $dataSite = new RegulationDepartTourneeItem([
                    'regulation_depart' => $data->id,
                    'site' => $sites[$i] ?? 0,
                    'client' => $client[$i] ?? "",
                    'nature' => $nature[$i] ?? "",
                    'nbre_colis' => $nbre_colis[$i] ?? 0,
                    'numero_scelle' => $numero_scelle[$i] ?? "",
                    'montant' => $montant[$i] ?? 0,
                ]);
                $dataSite->save();
            }
        }

        $sites_edit = $request->get('site_edit');
        $client_edit = $request->get('client_edit');
        $nature_edit = $request->get('nature_edit');
        $nbre_colis_edit = $request->get('nbre_colis_edit');
        $numero_scelle_edit = $request->get('numero_scelle_edit');
        $montant_edit = $request->get('montant_edit');
        $ids = $request->get('id');

        for ($i = 0; $i < count($sites_edit); $i++) {
            if (!empty($client_edit[$i]) && !empty($nbre_colis_edit[$i]) && !empty($montant_edit[$i])) {
                $dataSite = RegulationDepartTourneeItem::find($ids[$i]);
                $dataSite->site = $sites_edit[$i] ?? 0;
                $dataSite->client = $client_edit[$i] ?? "";
                $dataSite->nature = $nature_edit[$i] ?? "";
                $dataSite->nbre_colis = $nbre_colis_edit[$i] ?? 0;
                $dataSite->numero_scelle = $numero_scelle_edit[$i] ?? "";
                $dataSite->montant = $montant_edit[$i] ?? 0;

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
