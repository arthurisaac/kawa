<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\RegulationFacturationItem;
use App\Models\RegulationStockEntreeItem;
use App\Models\RegulationStockSortie;
use App\Models\RegulationStockSortieItem;
use App\Models\SiteDepartTournee;
use Illuminate\Database\Eloquent\Builder;
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

    public function listeDetaillee(Request $request)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $libelle = $request->get("libelle");
        $service = $request->get("service");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $stocks = RegulationStockSortieItem::all();
        if (isset($debut) && isset($fin)) {
            $stocks = RegulationStockSortieItem::with("stocks")->whereBetween('date', [$debut, $fin])->get();
        }
        if (isset($libelle)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($service)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($service) {
                    $builder->where("service", $service);
                })
                ->get();
        }
        if (isset($centre)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($centre) {
                    $builder->where("centre", $centre);
                })
                ->get();
        }
        if (isset($centre_regional)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($centre_regional) {
                    $builder->where("centre_regional", $centre_regional);
                })
                ->get();
        }
        if (isset($centre) && isset($centre_regional)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($centre, $centre_regional) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                })
                ->get();
        }
        if (isset($centre) && isset($centre_regional) && isset($service)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($centre, $centre_regional, $service) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                    $builder->where("service", $service);
                })
                ->get();
        }
        if (isset($centre) && isset($centre_regional) && isset($libelle)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($centre, $centre_regional, $service) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                })
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($centre) && isset($centre_regional) && isset($libelle) && isset($service)) {
            $stocks = RegulationStockSortieItem::with('stocks')
                ->whereHas("stocks", function(Builder $builder) use ($centre, $centre_regional, $service) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                    $builder->where("service", $service);
                })
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre, $centre_regional) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                })
                ->whereBetween('date', [$debut, $fin])->get();
        }
        if (isset($debut) && isset($fin) && isset($libelle)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereBetween('date', [$debut, $fin])
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($service)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereBetween('date', [$debut, $fin])
                ->where("service", $service)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($libelle) && isset($centre)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre) {
                    $builder->where("centre", $centre);
                })
                ->whereBetween('date', [$debut, $fin])
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($service) && isset($centre)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre, $service) {
                    $builder->where("centre", $centre);
                    $builder->where("service", $service);
                })
                ->whereBetween('date', [$debut, $fin])
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($libelle) && isset($centre_regional)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre_regional) {
                    $builder->where("centre_regional", $centre_regional);
                })
                ->whereBetween('date', [$debut, $fin])
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($libelle) && isset($centre_regional)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre_regional, $service) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("service", $service);
                })
                ->whereBetween('date', [$debut, $fin])
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($libelle) && isset($centre_regional) && isset($centre)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre_regional, $centre) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                })
                ->whereBetween('date', [$debut, $fin])
                ->where("libelle", $libelle)
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($service) && isset($centre_regional) && isset($centre)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre_regional, $centre, $service) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                    $builder->where("service", $service);
                })
                ->whereBetween('date', [$debut, $fin])
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($service) && isset($libelle) && isset($centre_regional) && isset($centre)) {
            $stocks = RegulationStockSortieItem::with("stocks")
                ->whereHas("stocks", function(Builder $builder) use ($centre_regional, $centre, $service) {
                    $builder->where("centre_regional", $centre_regional);
                    $builder->where("centre", $centre);
                    $builder->where("service", $service);
                })
                ->whereBetween('date', [$debut, $fin])
                ->where("libelle", $libelle)
                ->get();
        }
        return view("regulation.stock.sortie.liste-detaillee", compact('stocks', 'centres', 'centres_regionaux', 'centre', 'centre_regional', 'libelle', 'service', 'debut', 'fin'));
    }

    public function listeAppro(Request $request)
    {
        $libelles = array(
            "bordereau de transport",
            "bordereau de collecte",
            "cahier de maintenance",
            "cahier d’appro",
            "securipack extra",
            "securipack grand",
            "securipack moyen",
            "securipack petit",
            "pochette",
            "scellé DAB",
            "scellé caisse",
            "coiffe 10000",
            "coiffe 5000",
            "coiffe 2000",
            "coiffe 1000",
            "coiffe 500",
            "sac jute grand",
            "sac jute moyen",
            "TAG bleu",
            "TAG vert",
        );
        $stocks = array();
        foreach ($libelles as $libelle) {
            $factures = RegulationFacturationItem::where('libelle', 'like', $libelle)->sum('qte');
            $sorties = RegulationStockSortieItem::where('libelle', 'like', $libelle)->sum('qte_sortie');
            $appro = RegulationStockEntreeItem::whereHas('stocks', function (Builder $query) use ($libelle) {
                $query->where('libelle', 'like', $libelle);
            })->sum('qte_livree');
            array_push($stocks, [
                "libelle" => $libelle,
                "appro" => $appro,
                "facture" => $factures,
                "sortie" => $sorties,
                "restant" => $appro - ($factures + $sorties)
                //"restant" => $factures + $sorties
            ]);
        }
        return view('regulation.stock.liste', compact('stocks'));
    }

    public function gestionStock(Request $request)
    {
        $clients = Commercial_client::all();
        $sites = Commercial_site::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $client = $request->get("client");
        $site = $request->get("site");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $stockClients = Commercial_client::with("sites")
            /*->withCount([
                'sites as montantSorti' => function (Builder $query) {
                    $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantSorti"));
                        //->where('type', 'like', 'Dépôt / R');
                }
            ])
            ->withCount([
                'sites as montantEntree' => function (Builder $query) {
                    $query->select(DB::raw("SUM(regulation_arrivee_valeur_colis) as montantEntree"));
                }
            ])*/
            ->get();

        if (isset($centre)) {
            $stockClients = Commercial_client::with("sites")
                ->whereHas('tournees', function (Builder $query) use ($centre) {
                    $query->where('centre', 'like', '%' . $centre . '%');
                })
                ->withCount([
                    'sites as montantSorti' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantSorti"))
                            ->where('type', 'like', 'Dépôt / R');
                    }
                ])
                ->withCount([
                    'sites as montantEntree' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantEntree"));
                    }
                ])
                ->get();
        }

        if (isset($centre) && isset($centre_regional)) {
            $stockClients = Commercial_client::with("sites")
                ->whereHas('tournees', function (Builder $query) use ($centre_regional, $centre) {
                    $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
                    $query->where('centre', 'like', '%' . $centre . '%');
                })
                ->withCount([
                    'sites as montantSorti' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantSorti"))
                            ->where('type', 'like', 'Dépôt / R');
                    }
                ])
                ->withCount([
                    'sites as montantEntree' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantEntree"));
                    }
                ])
                ->get();
        }

        if (isset($centre_regional)) {
            $stockClients = Commercial_client::with("sites")
                ->whereHas('tournees', function (Builder $query) use ($centre_regional) {
                    $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
                })
                ->withCount([
                    'sites as montantSorti' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantSorti"))
                            ->where('type', 'like', 'Dépôt / R');
                    }
                ])
                ->withCount([
                    'sites as montantEntree' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantEntree"));
                    }
                ])
                ->get();
        }

        /*if (isset($debut) && isset($fin) && isset($client) && isset($site)) {
            $stockClients = Commercial_client::with("sites")
                ->withCount([
                    'sites as montantSorti' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantSorti"))
                            ->where('type', 'like', 'Dépôt / R');
                    }
                ])
                ->withCount([
                    'sites as montantEntree' => function (Builder $query) {
                        $query->select(DB::raw("SUM(regulation_arrivee_valeur_colis) as montantEntree"));
                    }
                ])
                ->get();
        }*/

        return view('regulation.stock.gestion', compact('clients', 'sites', 'site', 'client', 'debut', 'fin', 'centre', 'centre_regional', 'stockClients', 'centres', 'centres_regionaux'));
    }


    public function gestionClientStock(Request $request, $id)
    {
        $clients = Commercial_client::all();
        $sites = Commercial_site::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        if ($id) {
            $client = $id;
        } else {
            $client = $request->get("client");
        }
        $site = $request->get("site");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $stockClients = array();
        /*$stockClients = Commercial_client::with("sites")
            ->withCount([
                'sites as montantSorti' => function (Builder $query) {
                    $query->select(DB::raw("SUM(regulation_depart_valeur_colis) as montantSorti"))->where('type', 'like', 'Dépôt / R');
                }
            ])
            ->withCount([
                'sites as montantEntree' => function (Builder $query) {
                    $query->select(DB::raw("SUM(regulation_arrivee_valeur_colis) as montantEntree"));
                }
            ])
            ->get();*/

        if ($client)
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })->get();

        if ($client && isset($centre_regional))
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('tournees', function (Builder $query) use ($centre_regional) {
                    $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
                })
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })->get();

        if ($client && isset($centre))
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('tournees', function (Builder $query) use ($centre) {
                    $query->where('centre', 'like', '%' . $centre . '%');
                })
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })->get();

        if ($client && isset($centre))
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('tournees', function (Builder $query) use ($centre, $centre_regional) {
                    $query->where('centre', 'like', '%' . $centre . '%');
                    $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
                })
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })->get();


        if (isset($debut) && isset($fin) && isset($client)) {
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('tournees', function (Builder $query) use ($fin, $debut, $client) {
                    $query->whereBetween('date', [$debut, $fin]);
                })
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($client) && isset($site)) {
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('sites', function (Builder $query) use ($site) {
                    $query->where('id', 'like', '%' . $site . '%');
                })
                ->whereHas('tournees', function (Builder $query) use ($fin, $debut, $client, $site) {
                    $query->whereBetween('date', [$debut, $fin]);
                })
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($client) && isset($site) && isset($centre) && isset($centre_regional)) {
            $stockClients = SiteDepartTournee::with("tournees")
                ->whereHas('sites', function (Builder $query) use ($site) {
                    $query->where('id', 'like', '%' . $site . '%');
                })
                ->whereHas('tournees', function (Builder $query) use ($fin, $debut, $client, $site, $centre, $centre_regional) {
                    $query->whereBetween('date', [$debut, $fin]);
                    $query->where('centre', 'like', '%' . $centre . '%');
                    $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
                })
                ->whereHas('sites', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })
                ->get();
        }

        return view('regulation.stock.gestion-client', compact('clients',  'sites', 'site', 'client', 'debut', 'fin', 'centre', 'centre_regional', 'stockClients', 'centres', 'centres_regionaux', 'id'));
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

        $date = $request->get("date");
        $qte_sortie = $request->get("qte_sortie");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $reference = $request->get("reference");
        $libelle = $request->get("libelle");

        if (!empty($qte_sortie)) {
            for ($i = 0; $i < count($qte_sortie); $i++) {
                $item = new RegulationStockSortieItem([
                    "stock_sortie" => $data->id,
                    "date" => $date[$i],
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

        return redirect("/regulation-stock-sortie-liste")->with("success", "Enregistré avec succès");
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
            $items = RegulationStockSortieItem::where("stock_sortie", $id)->get();
            foreach ($items as $item) {
                $sortie = RegulationStockSortieItem::find($item->id);
                $sortie->delete();
            }
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
