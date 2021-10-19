<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\RegulationStockSortie;
use App\Models\RegulationStockSortieItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegulationStockSortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view("regulation.stock.sortie.index", compact('centres_regionaux', 'centres'));
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $stocks = RegulationStockSortie::all();
        if (isset($debut) && isset($fin)) {
            $stocks = RegulationStockSortie::all()->whereBetween('date', [$debut, $fin])->get();
        }
        return view("regulation.stock.sortie.liste", compact('stocks'));
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
        $data = new RegulationStockSortie([
            "date" => $request->get("date_sortie"),
            "centre" => $request->get("centre"),
            "centre_regional" => $request->get("centre_regional"),
            "service" => $request->get("service"),
            "receveur" => $request->get("receveur"),
        ]);
        $data->save();

        $qte_prevu = $request->get("qte_prevu");
        $date = $request->get("date");
        $qte_sortie = $request->get("qte_sortie");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $reference = $request->get("reference");
        $libelle = $request->get("libelle");

        if (!empty($qte_prevu) && !empty($qte_sortie)) {
            for ($i = 0; $i < count($qte_prevu); $i++) {
                $item = new RegulationStockSortieItem([
                    "stock_sortie" => $data->id,
                    "date" => $date[$i],
                    "qte_prevu" => $qte_prevu[$i],
                    "qte_sortie" => $qte_sortie[$i],
                    "debut" => $debut[$i],
                    "fin" => $fin[$i],
                    "reference" => $reference[$i],
                    "libelle" => $libelle[$i],
                ]);
                $item->save();
            }
        }

        return redirect("/regulation-stock-sortie-liste")->with("success", "Enregistré avec succès");
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
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $stock = RegulationStockSortie::with('items')->find($id);
        $items = RegulationStockSortieItem::all()->where('stock_sortie', '=', $id);
        return view("regulation.stock.sortie.edit", compact('stock', 'items', 'centres', 'centres_regionaux'));
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
        $data = RegulationStockSortie::find($id);
        $data->date = $request->get("date");
        $data->receveur = $request->get("receveur");
        $data->centre = $request->get("centre");
        $data->centre_regional = $request->get("centre_regional");
        $data->service = $request->get("service");
        $data->save();

        $date_item = $request->get("date_item");
        $qte_prevu = $request->get("qte_prevu");
        $qte_sortie = $request->get("qte_sortie");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $reference = $request->get("reference");
        $libelle = $request->get("libelle");
        $item_id = $request->get("item_ids");

        if (!empty($item_id)) {
            for ($i = 0; $i < count($item_id); $i++) {
                if (empty($item_id[$i])) {
                    $item = new RegulationStockSortieItem([
                        "stock_sortie" => $data->id,
                        "date" => $date_item[$i],
                        "qte_prevu" => $qte_prevu[$i],
                        "qte_sortie" => $qte_sortie[$i],
                        "debut" => $debut[$i],
                        "fin" => $fin[$i],
                        "reference" => $reference[$i],
                        "libelle" => $libelle[$i],
                    ]);
                    $item->save();
                } else {
                    $item = RegulationStockSortieItem::find($item_id[$i]);
                    $item->date = $date_item[$i];
                    $item->qte_prevu = $qte_prevu[$i];
                    $item->qte_sortie = $qte_sortie[$i];
                    $item->debut = $debut[$i];
                    $item->fin = $fin[$i];
                    $item->reference = $reference[$i];
                    $item->libelle = $libelle[$i];
                    $item->save();
                }
            }
        }

        /*$qte_prevu_edit = $request->get("qte_prevu_edit");
        $qte_sortie_edit = $request->get("qte_sortie_edit");
        $debut_edit = $request->get("debut_edit");
        $fin_edit = $request->get("fin_edit");
        $reste_edit = $request->get("reste_edit");
        $item_id = $request->get("item_ids");

        if (!empty($qte_prevu_edit) && !empty($qte_sortie_edit)) {
            for ($i = 0; $i < count($qte_prevu_edit); $i++) {
                $item = RegulationStockSortieItem::find($item_id[$i]);
                $item->qte_prevu = $qte_prevu_edit[$i];
                $item->qte_sortie = $qte_sortie_edit[$i];
                $item->debut = $debut_edit[$i];
                $item->fin = $fin_edit[$i];
                $item->reste = $reste_edit[$i];
                $item->save();
            }
        }*/

        return redirect()->back()->with("success", "Enregistré avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RegulationStockSortie::find($id);
        if ($data) {
            $data->delete();
        }
        return response()->json([
            "message" => "OK"
        ]);
    }

    public function destroyItem($id)
    {
        $data = RegulationStockSortieItem::find($id);
        if ($data) {
            $data->delete();
        }
        return response()->json([
            "message" => "OK"
        ]);
    }
}
