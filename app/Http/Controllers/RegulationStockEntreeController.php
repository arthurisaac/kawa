<?php

namespace App\Http\Controllers;

use App\Models\AchatFournisseur;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\RegulationStockEntree;
use App\Models\RegulationStockEntreeItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $fournisseurs = AchatFournisseur::all();
        $numero = DB::table('regulation_stock_entrees')->max('id') + 1 . '-' . date('Y-m-d');
        return view("regulation.stock.entree.index", compact('centres_regionaux', 'centres', 'fournisseurs', 'numero'));
    }


    public function liste()
    {
        $stocks = RegulationStockEntree::with('items')->get();
        return view("regulation.stock.entree.liste", compact('stocks'));
    }

    public function listeDetaillee(Request $request)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $fournisseurs = AchatFournisseur::all();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $libelle = $request->get("libelle");
        $fournisseur = $request->get("fournisseur");

        $stocks = RegulationStockEntree::with('items')->get();

        if (isset($debut) && isset($fin)) {
            $stocks = RegulationStockEntree::with('items')
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }
        if (isset($centre)) {
            $stocks = RegulationStockEntree::with('items')
                ->where("centre", "=", $centre)
                ->get();
        }
        if (isset($centre_regional)) {
            $stocks = RegulationStockEntree::with('items')
                ->where("centre_regional", "=", $centre_regional)
                ->get();
        }
        if (isset($centre) && isset($centre_regional)) {
            $stocks = RegulationStockEntree::with('items')
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->get();
        }
        if (isset($fournisseur)) {
            $stocks = RegulationStockEntree::with('items')
                ->where("fournisseur", "like", "%". $fournisseur . "%")
                ->get();
        }
        if (isset($libelle)) {
            $stocks = RegulationStockEntree::with('items')
                ->where("libelle", "like", "%". $libelle . "%")
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($libelle)) {
            $stocks = RegulationStockEntree::with('items')
                ->whereBetween("date", [$debut, $fin])
                ->where("libelle", "like", "%". $libelle . "%")
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($fournisseur)) {
            $stocks = RegulationStockEntree::with('items')
                ->whereBetween("date", [$debut, $fin])
                ->where("fournisseur", "like", "%". $fournisseur . "%")
                ->get();
        }

        return view("regulation.stock.entree.liste-detaillee", compact('stocks', 'centres', 'centres_regionaux', 'centre', 'centre_regional', 'debut', 'fin', 'libelle', 'fournisseurs', 'fournisseur'));
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
        $stock = RegulationStockEntree::find($id);
        $items = RegulationStockEntreeItem::all()->where('stock_entree', '=', $id);
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $fournisseurs = AchatFournisseur::all();
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
        $data = RegulationStockEntree::find($id);
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
                    $item = RegulationStockEntreeItem::find($ids[$i]);
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
        $data = RegulationStockEntree::find($id);
        if ($data) {
            $items = RegulationStockEntreeItem::where("stock_entree", $id)->get();
            foreach ($items as $item) {
                $ent = RegulationStockEntreeItem::find($item->id);
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
        $data = RegulationStockEntreeItem::find($id);
        if ($data) {
            $data->delete();
        }
        return response()->json([
            "message" => "donnee supprimee"
        ]);
    }
}
