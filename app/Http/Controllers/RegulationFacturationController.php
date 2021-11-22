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
        $regulations = RegulationFacturation::with('clients')->get();
        return view('.regulation.facturation.liste', compact('regulations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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

        return redirect("/regulation-facturation-liste")->with("success", "Enregistré avec succès");
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
        $regulation = RegulationFacturation::with('items')->find($id);
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $items = RegulationFacturationItem::where('facturation', $id)->get();
        return view('.regulation.facturation.edit', compact('regulation', 'clients', 'centres', 'centres_regionaux', 'items'));
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
        $data = RegulationFacturation::find($id);
        $data->date = $request->get("date");
        $data->numero = $request->get("numero");
        $data->centre = $request->get("centre");
        $data->centre_regional = $request->get("centre_regional");
        $data->montantTotal = $request->get("montantTotal");
        $data->client = $request->get("client");
        $data->type = $request->get("type");
        $data->save();

        $libelle = $request->get("libelle");
        $qte = $request->get("qte");
        $pu = $request->get("pu");
        $reference = $request->get("reference");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $montant = $request->get("montant");
        $ids = $request->get('ids');

        if (!empty($ids)) {
            for ($i = 0; $i < count($ids); $i++) {

                if (empty($ids[$i])) {
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
                } else {
                    $item = RegulationFacturationItem::find($ids[$i]);
                    if ($item) {
                        $item->facturation = $data->id;
                        $item->libelle = $libelle[$i];
                        $item->qte = $qte[$i];
                        $item->pu = $pu{$i};
                        $item->reference = $reference[$i];
                        $item->debut = $debut[$i];
                        $item->fin = $fin[$i];
                        $item->montant = $montant[$i];
                        $item->save();
                    }
                }
            }
        }

        return redirect("/regulation-facturation-liste")->with("success", "Enregistré avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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

    public function destroyItem($id)
    {
        $data = RegulationFacturationItem::find($id);
        if ($data) {
            $items = RegulationFacturationItem::where("facturation", $id)->get();
            foreach ($items as $item) {
                $fact = RegulationFacturationItem::find($item->id);
                $fact->delete();
            }
            $data->delete();
        }
        return response()->json([
            "message" => "good"
        ]);
    }
}
