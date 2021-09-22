<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\RegulationFacturation;
use App\Models\RegulationFacturationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegulationFacturationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numero = DB::table('regulation_facturations')->max('id') + 1 . '-' . date('Y-m-d');
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('.regulation.facturation.index', compact('numero', 'clients', 'centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $regulations = RegulationFacturation::all();
        return view('.regulation.facturation.liste', compact('regulations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new RegulationFacturation([
            'date' => $request->get("date"),
            'numero' => $request->get("numero"),
            'centre' => $request->get("centre"),
            'centre_regional' => $request->get("centre_regional"),
            'montantTotal' => $request->get("montantTotal"),
            'client' => $request->get("client"),
            'type' => $request->get("type"),
        ]);
        $data->save();

        $libelle = $request->get("libelle");
        $qte = $request->get("qte");
        $pu = $request->get("pu");
        $reference = $request->get("reference");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $montant = $request->get("montant");

        if (!empty($libelle) && !empty($qte) && !empty($pu)) {
            for ($i = 0; $i < count($libelle); $i++) {
                $item = new RegulationFacturationItem([
                    'facturation' => $data->id,
                    'libelle' => $libelle[$i],
                    'qte' => $qte[$i],
                    'pu' => $pu{$i},
                    'reference' => $reference[$i],
                    'debut' => $debut[$i],
                    'fin' => $fin[$i],
                    'montant' => $montant[$i],
                ]);
                $item->save();
            }
        }

        return redirect()->back()->with("success", "Enregistré avec succès");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RegulationFacturation::find($id);
        if ($data) {
            $data->delete();
        }
        return response()->json([
            "message" => "good"
        ]);
    }
}
