<?php

namespace App\Http\Controllers;

use App\Models\CaisseEntreeColis;
use App\Models\CaisseEntreeColisItem;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_site;
use App\Models\DepartTournee;
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
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        return view('caisse.entree-colis.index',
            compact('centres', 'centres_regionaux', 'numero', 'sites', 'tournees'));
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $colis = CaisseEntreeColis::with("sites")->get();
        if (isset($debut) && isset($fin)) {
            $colis = CaisseEntreeColis::with("sites")->whereBetween('date', [$debut, $fin])->get();
        }
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
            'noTournee' => $request->get("noTournee"),
            'remettant' => $request->get("remettant"),
        ]);
        $data->save();

        $site = $request->get("site");
        $colis = $request->get("colis");
        $nature = $request->get("nature");
        $scelle = $request->get("scelle");
        $nbre_colis = $request->get("nbre_colis");
        $valeur_colis_xof_entree = $request->get("valeur_colis_xof");
        $device_etrangere_dollar_entree = $request->get("device_etrangere_dollar");
        $device_etrangere_euro_entree = $request->get("device_etrangere_dollar");
        $pierre_precieuse_entree = $request->get("pierre_precieuse_entree");
        //$montant = $request->get("montant");

        if (!empty($site) && !empty($nbre_colis)) {
            for ($i = 0; $i < count($nbre_colis); $i++) {
                $item = new CaisseEntreeColisItem([
                    "entree_colis" => $data->id,
                    "site" => $site[$i],
                    "colis" => $colis[$i],
                    "nature" => $nature[$i],
                    "scelle" => $scelle[$i],
                    "nbre_colis" => $nbre_colis[$i],
                    'valeur_colis_xof_entree' => $valeur_colis_xof_entree[$i],
                    'device_etrangere_dollar_entree' => $device_etrangere_dollar_entree[$i],
                    'device_etrangere_euro_entree' => $device_etrangere_euro_entree[$i],
                    'pierre_precieuse_entree' => $pierre_precieuse_entree[$i],
                    //"montant" => $montant[$i],
                ]);
                $item->save();
            }
        }

        return redirect("caisse-entree-colis-liste")->with('success', 'Enregistrement effectué!');

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
        $colis = CaisseEntreeColis::with('sites')->find($id);
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        //$items = DB::table('caisse_entree_colis_items')->where('entree_colis', $id)->get();
        $items = CaisseEntreeColisItem::all()->where("entree_colis", $id);
        $agents = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $chefBords = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $sites = Commercial_site::with("clients")->get();
        return view('/caisse/entree-colis.edit',
            compact('colis', 'centres', 'centres_regionaux', 'personnels', 'items', 'agents', 'chefBords', 'sites', 'tournees'));
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
        $data->noTournee = $request->get("noTournee");
        $data->remettant = $request->get("remettant");

        $data->save();

        $site = $request->get("site");
        $autre = $request->get("autre");
        $nature = $request->get("nature");
        $scelle = $request->get("scelle");
        $nbre_colis = $request->get("nbre_colis");

        $colis =  $request->get("colis");
        $valeur_colis_xof = $request->get("valeur_colis_xof");
        $device_etrangere_dollar = $request->get("device_etrangere_dollar");
        $device_etrangere_euro = $request->get("device_etrangere_dollar");
        $pierre_precieuse = $request->get("pierre_precieuse_entree");
        //$montant = $request->get("montant");
        $ids = $request->get("ids");

        if (!empty($site) && !empty($nbre_colis)) {
            for ($i = 0; $i < count($nbre_colis); $i++) {
                if (empty($ids[$i])) {
                    $item = new CaisseEntreeColisItem([
                        "entree_colis" => $data->id,
                        "site" => $site[$i],
                        "colis" => $colis[$i],
                        "nature" => $nature[$i],
                        "scelle" => $scelle[$i],
                        "nbre_colis" => $nbre_colis[$i],

                        'valeur_colis_xof_entree' => $valeur_colis_xof[$i],
                        'device_etrangere_dollar_entree' => $device_etrangere_dollar[$i],
                        'device_etrangere_euro_entree' => $device_etrangere_euro[$i],
                        'pierre_precieuse_entree' => $pierre_precieuse[$i],
                        //"montant" => $montant[$i],
                    ]);
                    $item->save();
                } else {
                    $item = CaisseEntreeColisItem::find($ids[$i]);
                    $item->site = $site[$i];
                    $item->colis = $colis[$i];
                    $item->nature = $nature[$i];
                    $item->scelle = $scelle[$i];
                    $item->nbre_colis = $nbre_colis[$i];

                    $item->valeur_colis_xof_entree = $valeur_colis_xof[$i];
                    $item->device_etrangere_dollar_entree = $device_etrangere_dollar[$i];
                    $item->device_etrangere_euro_entree = $device_etrangere_euro[$i];
                    $item->pierre_precieuse_entree = $pierre_precieuse[$i];
                    $item->save();
                }


            }
        }

        /*$site_edit = $request->get("site_edit");
        $colis_edit = $request->get("colis_edit");
        $nature_edit = $request->get("nature_edit");
        $scelle_edit = $request->get("scelle_edit");
        $nbre_colis_edit = $request->get("nbre_colis_edit");
        $valeur_colis_xof_entree = $request->get("valeur_colis_xof");
        $device_etrangere_dollar_entree = $request->get("device_etrangere_dollar");
        $device_etrangere_euro_entree = $request->get("device_etrangere_dollar");
        $pierre_precieuse_entree = $request->get("pierre_precieuse_entree");
        //$montant_edit = $request->get("montant_edit");


        if (!empty($site_edit) && !empty($nbre_colis_edit)) {
            for ($i = 0; $i < count($nbre_colis_edit); $i++) {
                $item = CaisseEntreeColisItem::find($ids[$i]);
                $item->site = $site_edit[$i];
                $item->colis = $colis_edit[$i];
                $item->nature = $nature_edit[$i];
                $item->scelle = $scelle_edit[$i];
                $item->nbre_colis = $nbre_colis_edit[$i];

                $item->valeur_colis_xof_entree = $valeur_colis_xof_entree[$i];
                $item->device_etrangere_dollar_entree = $device_etrangere_dollar_entree[$i];
                $item->device_etrangere_euro_entree = $device_etrangere_euro_entree[$i];
                $item->pierre_precieuse_entree = $pierre_precieuse_entree[$i];
                //$item->montant = $montant_edit[$i];
                $item->save();
            }
        }*/

        //return redirect()->back()->with('success', 'Enregistrement effectué!');
        return redirect("caisse-entree-colis-liste")->with('success', 'Enregistrement effectué!');
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
