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
        //
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
        //
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
