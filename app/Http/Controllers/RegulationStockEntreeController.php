<?php

namespace App\Http\Controllers;

use App\Models\AchatFournisseur;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\RegulationStockEntree;
use App\Models\RegulationStockEntreeItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegulationStockEntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $fournisseurs = AchatFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        $numero = DB::table('regulation_stock_entrees')->where('localisation_id', Auth::user()->localisation_id)->max('id') + 1 . '-' . date('Y-m-d');
        return view("regulation.stock.entree.index", compact('centres_regionaux', 'centres', 'fournisseurs', 'numero'));
    }


    public function liste()
    {
        $stocks = RegulationStockEntree::with('items')->where('localisation_id', Auth::user()->localisation_id)->get();
        return view("regulation.stock.entree.liste", compact('stocks'));
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
        $data = new RegulationStockEntree([
            'numero' => $request->get("numero"),
            'centre' => $request->get("centre"),
            'centre_regional' => $request->get("centre_regional"),
            'date' => $request->get("date_appro"),
            'libelle' => $request->get('libelle'),
            'fournisseur' => $request->get("fournisseur"),
        ]);
        $data->save();

        $qte_attendu = $request->get("qte_attendu");
        $date = $request->get("date");
        $qte_livree = $request->get("qte_livree");
        $no_debut = $request->get("no_debut");
        $no_fin = $request->get("no_fin");
        $reste = $request->get("reste");

        if (!empty($qte_attendu) && !empty($qte_livree)) {
            for ($i = 0; $i < count($qte_attendu); $i++) {
                $item = new RegulationStockEntreeItem([
                    "stock_entree" => $data->id,
                    "qte_attendu" => $qte_attendu[$i],
                    "date" => $date[$i],
                    "qte_livree" => $qte_livree[$i],
                    "debut" => $no_debut[$i],
                    "fin" => $no_fin[$i],
                    "reste" => $reste[$i],
                ]);
                $item->save();
            }
        }

        return redirect("/regulation-stock-entree-liste")->with("success", "Enregistré avec succès");
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
        $stock = RegulationStockEntree::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $items = RegulationStockEntreeItem::all()->where('stock_entree', '=', $id)->where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $fournisseurs = AchatFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view("regulation.stock.entree.edit", compact('centres_regionaux', 'centres', 'fournisseurs', 'stock', 'items'));
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
        $data = RegulationStockEntree::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $data->numero = $request->get("numero");
        $data->centre = $request->get("centre");
        $data->centre_regional = $request->get("centre_regional");
        $data->date = $request->get("date_appro");
        $data->libelle = $request->get('libelle');
        $data->fournisseur = $request->get("fournisseur");
        $data->save();

        /*$qte_attendu_edit = $request->get("qte_attendu_edit");
        $qte_livree_edit = $request->get("qte_livree_edit");
        $no_debut_edit = $request->get("no_debut_edit");
        $no_fin_edit = $request->get("no_fin_edit");
        $reste_edit = $request->get("reste_edit");
        $ids = $request->get("item_ids");

        if (!empty($qte_attendu_edit) && !empty($qte_livree_edit)) {
            for ($i = 0; $i < count($qte_attendu_edit); $i++) {
                $item = RegulationStockEntreeItem::find($ids[$i]);
                $item->qte_attendu = $qte_attendu_edit[$i];
                $item->qte_livree = $qte_livree_edit[$i];
                $item->debut = $no_debut_edit[$i];
                $item->fin = $no_fin_edit[$i];
                $item->reste = $reste_edit[$i];
                $item->save();
            }
        }*/

        $qte_attendu = $request->get("qte_attendu");
        $date = $request->get("date");
        $qte_livree = $request->get("qte_livree");
        $no_debut = $request->get("no_debut");
        $no_fin = $request->get("no_fin");
        $reste = $request->get("reste");
        $ids = $request->get("item_ids");

        if (!empty($qte_attendu) && !empty($qte_livree)) {
            for ($i = 0; $i < count($ids); $i++) {
                if (empty($ids[$i])) {
                    $item = new RegulationStockEntreeItem([
                        "stock_entree" => $id,
                        "date" => $date[$i],
                        "qte_attendu" => $qte_attendu[$i],
                        "qte_livree" => $qte_livree[$i],
                        "debut" => $no_debut[$i],
                        "fin" => $no_fin[$i],
                        "reste" => $reste[$i],
                    ]);
                    $item->save();
                } else {
                    $item = RegulationStockEntreeItem::where('localisation_id', Auth::user()->localisation_id)->find($ids[$i]);
                    $item->date = $qte_attendu[$i];
                    $item->qte_attendu = $qte_attendu[$i];
                    $item->date = $date[$i];
                    $item->qte_livree = $qte_livree[$i];
                    $item->debut = $no_debut[$i];
                    $item->fin = $no_fin[$i];
                    $item->reste = $reste[$i];
                    $item->save();
                }

            }
        }

        return redirect("/regulation-stock-entree-liste")->with("success", "Enregistré avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = RegulationStockEntree::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) {
            $items = RegulationStockEntreeItem::where("stock_entree", $id)->where('localisation_id', Auth::user()->localisation_id)->get();
            foreach ($items as $item) {
                $ent = RegulationStockEntreeItem::where('localisation_id', Auth::user()->localisation_id)->find($item->id);
                $ent->delete();
            }
            $data->delete();
        }
        return response()->json([
            "message" => "donnee supprimee"
        ]);
    }

    public function destroyItem($id)
    {
        $data = RegulationStockEntreeItem::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) {
            $data->delete();
        }
        return response()->json([
            "message" => "donnee supprimee"
        ]);
    }
}
