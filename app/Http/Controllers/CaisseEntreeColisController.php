<?php

namespace App\Http\Controllers;

use App\Models\CaisseEntreeColis;
use App\Models\CaisseEntreeColisItem;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_site;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CaisseEntreeColisController extends Controller
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
        $sites = Commercial_site::with("clients")->get();
        $numero = DB::table('caisse_entree_colis')->max('id') + 1 . '-' . date('Y-m-d');
        return view('caisse.entree-colis.index',
            compact('centres', 'centres_regionaux', 'numero', 'sites'));
    }

    public function liste()
    {
        $colis = CaisseEntreeColis::with("sites")->get();
        return view('/caisse/entree-colis.liste', compact('colis'));
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
        $data = new CaisseEntreeColis([
            'date' => $request->get("date"),
            'heure' => $request->get("heure"),
            'centre' => $request->get("centre"),
            'centre_regional' => $request->get("centre_regional"),
            'totalMontant' => $request->get("totalMontant"),
            'totalColis' => $request->get("totalColis"),
        ]);
        $data->save();

        $site = $request->get("site");
        $colis = $request->get("colis");
        $nature = $request->get("nature");
        $scelle = $request->get("scelle");
        $nbre_colis = $request->get("nbre_colis");
        $montant = $request->get("montant");

        if (!empty($site) && !empty($nbre_colis)) {
            for ($i = 0; $i < count($nbre_colis); $i++) {
                $item = new CaisseEntreeColisItem([
                    "entree_colis" => $data->id,
                    "site" => $site[$i],
                    "colis" => $colis[$i],
                    "nature" => $nature[$i],
                    "scelle" => $scelle[$i],
                    "nbre_colis" => $nbre_colis[$i],
                    "montant" => $montant[$i],
                ]);
                $item->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistrement effectué!');

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
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnels = Personnel::all();
        $colis = CaisseEntreeColis::where('id', $id)->get();
        //$items = DB::table('caisse_entree_colis_items')->where('entree_colis', $id)->get();
        $items = CaisseEntreeColisItem::all()->where("entree_colis", $id);
        $agents = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $chefBords = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $sites = Commercial_site::with("clients")->get();
        $coli = $colis[0];
        return view('/caisse/entree-colis.edit',
            compact('coli', 'centres', 'centres_regionaux', 'personnels', 'items', 'agents', 'chefBords', 'sites'));
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
        $data = CaisseEntreeColis::find($id);
        $data->date = $request->get("date");
        $data->heure = $request->get("heure");
        $data->centre = $request->get("centre");
        $data->centre_regional = $request->get("centre_regional");

        $data->save();

        $site = $request->get("site");
        $autre = $request->get("autre");
        $nature = $request->get("nature");
        $scelle = $request->get("scelle");
        $nbre_colis = $request->get("nbre_colis");
        $montant = $request->get("montant");

        if (!empty($site) && !empty($nbre_colis)) {
            for ($i = 0; $i < count($nbre_colis); $i++) {
                $item = new CaisseEntreeColisItem([
                    "entree_colis" => $data->id,
                    "site" => $site[$i],
                    "autre" => $autre[$i],
                    "nature" => $nature[$i],
                    "scelle" => $scelle[$i],
                    "nbre_colis" => $nbre_colis[$i],
                    "montant" => $montant[$i],
                ]);
                $item->save();
            }
        }

        $site_edit = $request->get("site_edit");
        $colis_edit = $request->get("colis_edit");
        $nature_edit = $request->get("nature_edit");
        $scelle_edit = $request->get("scelle_edit");
        $nbre_colis_edit = $request->get("nbre_colis_edit");
        $montant_edit = $request->get("montant_edit");
        $ids = $request->get("ids");

        if (!empty($site_edit) && !empty($nbre_colis_edit)) {
            for ($i = 0; $i < count($nbre_colis_edit); $i++) {
                $item = CaisseEntreeColisItem::find($ids[$i]);
                $item->site = $site_edit[$i];
                $item->colis = $colis_edit[$i];
                $item->nature = $nature_edit[$i];
                $item->scelle = $scelle_edit[$i];
                $item->nbre_colis = $nbre_colis_edit[$i];
                $item->montant = $montant_edit[$i];
                $item->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $coli = CaisseEntreeColis::find($id);
        $coli->delete();
        $items = DB::table('caisse_entree_colis_items')->where('entree_colis', $id)->get();
        foreach ($items as $item) {
            $i = CaisseEntreeColisItem::find($item->id);
            $i->delete();
        }
        return redirect('/caisse-entree-colis-liste')->with('success', 'Service supprimé avec succès!');
    }
}
