<?php

namespace App\Http\Controllers;

use App\Models\Convoyeur;
use App\Models\DepartTournee;
use App\Models\Personnel;
use App\Models\RegulationDepartTournee;
use App\Models\RegulationDepartTourneeItem;
use App\Models\SiteDepartTournee;
use App\Models\VidangeGenerale;
use Illuminate\Http\Request;

class RegulationArriveeTourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departTournees = RegulationDepartTournee::with('tournees')->get();
        $convoyeurs = Convoyeur::all();
        $personnels = Personnel::all();
        $sites = RegulationDepartTourneeItem::with('sites')->get();
        $vidanges = VidangeGenerale::all();
        return view('regulation.arrivee-tournee.index', compact('departTournees', 'convoyeurs', 'personnels', 'sites', 'vidanges'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = RegulationDepartTournee::find($request->get('idTournee'));
        $data->totalMontant = $request->get("totalMontant");
        $data->totalColis = $request->get("totalColis");
        $data->kmArrivee = $request->get("kmArrivee");
        $data->heureArrivee = $request->get("heureArrivee");
        $data->save();

        $sites_edit = $request->get('site');
        $client_edit = $request->get('client');
        $nature_edit = $request->get('nature');
        $autre_edit = $request->get('autre');
        $nbre_colis_edit = $request->get('nbre_colis');
        $numero_scelle_edit = $request->get('numero_scelle');
        $montant_edit = $request->get('montant');
        $ids = $request->get('site_id');

        for ($i = 0; $i < count($sites_edit); $i++) {
            if (!empty($client_edit[$i]) && !empty($nbre_colis_edit[$i]) && !empty($montant_edit[$i])) {
                $dataSite = RegulationDepartTourneeItem::find($ids[$i]);
                $dataSite->client = $client_edit[$i] ?? "";
                $dataSite->nature = $nature_edit[$i] ?? "";
                $dataSite->nbre_colis = $nbre_colis_edit[$i] ?? 0;
                $dataSite->autre = $autre_edit[$i] ?? 0;
                $dataSite->numero_scelle = $numero_scelle_edit[$i] ?? "";
                $dataSite->montant = $montant_edit[$i] ?? 0;

                $dataSite->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
