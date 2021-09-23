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
        $numero = DB::table('regulation_stock_sorties')->max('id') + 1 . '-' . date('Y-m-d');
        return view("regulation.stock.sortie.index", compact('centres_regionaux', 'centres', 'numero'));
    }

    public function liste()
    {
        $stocks = RegulationStockSortie::all();
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
            "date" => $request->get("date"),
            "numero" => $request->get("numero"),
            "centre" => $request->get("centre"),
            "centre_regional" => $request->get("centre_regional"),
            "libelle" => $request->get("libelle"),
            "service" => $request->get("service"),
        ]);
        $data->save();

        $qte_prevu = $request->get("qte_prevu");
        $qte_sortie = $request->get("qte_sortie");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $reste = $request->get("reste");

        if (!empty($qte_prevu) && !empty($qte_sortie)) {
            for ($i = 0; $i < count($qte_prevu); $i++) {
                $item = new RegulationStockSortieItem([
                    "stock_sortie" => $data->id,
                    "qte_prevu" => $qte_prevu[$i],
                    "qte_sortie" => $qte_sortie[$i],
                    "debut" => $debut[$i],
                    "fin" => $fin[$i],
                    "reste" => $reste[$i],
                ]);
                $item->save();
            }
        }

        return redirect()->back()->with("success", "Enregistré avec succès");
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
        $stock = RegulationStockSortie::find($id);
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
        $data->numero = $request->get("numero");
        $data->centre = $request->get("centre");
        $data->centre_regional = $request->get("centre_regional");
        $data->libelle = $request->get("libelle");
        $data->service = $request->get("service");
        $data->save();

        $qte_prevu = $request->get("qte_prevu");
        $qte_sortie = $request->get("qte_sortie");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $reste = $request->get("reste");

        if (!empty($qte_prevu) && !empty($qte_sortie)) {
            for ($i = 0; $i < count($qte_prevu); $i++) {
                $item = new RegulationStockSortieItem([
                    "stock_sortie" => $data->id,
                    "qte_prevu" => $qte_prevu[$i],
                    "qte_sortie" => $qte_sortie[$i],
                    "debut" => $debut[$i],
                    "fin" => $fin[$i],
                    "reste" => $reste[$i],
                ]);
                $item->save();
            }
        }

        $qte_prevu_edit = $request->get("qte_prevu_edit");
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
        }

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
}
