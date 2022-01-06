<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\RegulationFacturation;
use App\Models\RegulationFacturationItem;
use Illuminate\Database\Eloquent\Builder;
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
        $clients = Commercial_client::orderBy("client_nom")->get();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $sites = Commercial_site::orderBy("site")->get();
        return view('.regulation.facturation.index', compact('numero', 'clients', 'centres', 'centres_regionaux', 'sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    /*public function liste(Request $request)
    {
        $regulations = RegulationFacturation::with('clients')->get();

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients = Commercial_client::orderBy('client_nom')->get();
        $sites_com = Commercial_site::orderBy('site')->get();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $client = $request->get("client");
        $site = $request->get("site");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $libelle = $request->get("libelle");

        if (isset($debut) && isset($fin)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }


        if (isset($client)) {
            $regulations = RegulationFacturation::with('clients')
                ->where("client", "=", $client)
                ->get();
        }

        if (isset($site)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("site", "=", $site)
                ->get();
        }

        if (isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->whereHas('items', function (Builder $query) use ($libelle) {
                    $query->where('libelle', 'like', '%' . $libelle . '%');
                })
                ->get();
        }

        if (isset($centre)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("centre", "=", $centre)
                ->get();
        }

        if (isset($centre_regional)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("centre_regional", "=", $centre_regional)
                ->get();
        }

        if (isset($centre_regional) &&  isset($centre)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->get();
        }

        if (isset($centre_regional) && isset($centre) && isset($site)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->where("site", "=", $site)
                ->get();
        }

        if (isset($centre_regional) && isset($centre) && isset($client)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->where("client", "=", $client)
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($client)) {
            $regulations = RegulationFacturation::with('clients')
                ->where("client", "=", $client)
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($client) && isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('clients', function (Builder $query) use ($client) {
                    $query->where('client', 'like', '%' . $client . '%');
                })
                ->whereHas('items', function (Builder $query) use ($libelle) {
                    $query->where('libelle', 'like', '%' . $libelle . '%');
                })
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site)) {
            $regulations = RegulationFacturation::with('clients')
                ->where("site", "=", $site)
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site) && isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('items', function (Builder $query) use ($libelle) {
                    $query->where('libelle', 'like', '%' . $libelle . '%');
                })
                ->where("site", "=", $site)
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('items', function (Builder $query) use ($libelle) {
                    $query->where('libelle', 'like', '%' . $libelle . '%');
                })
                ->whereBetween("date", [$debut, $fin])
                ->get();
        }

        if (isset($centre_regional) &&  isset($centre) && isset($client) && isset($site)) {
            $regulations = RegulationFacturation::with('clients')
                ->with("sites")
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->where("site", "=", $site)
                ->where("client", "=", $client)
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site) && isset($client)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereBetween("date", [$debut, $fin])
                ->where("site", "=", $site)
                ->where("client", "=", $client)
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereBetween("date", [$debut, $fin])
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional) && isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('items', function (Builder $query) use ($libelle) {
                    $query->where('libelle', 'like', '%' . $libelle . '%');
                })
                ->whereBetween("date", [$debut, $fin])
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional) && isset($site) && isset($client)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereBetween("date", [$debut, $fin])
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->where("site", "=", $site)
                ->where("client", "=", $client)
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional) && isset($site) && isset($client) && isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('items', function (Builder $query) use ($libelle) {
                    $query->where('libelle', 'like', '%' . $libelle . '%');
                })
                ->whereBetween("date", [$debut, $fin])
                ->where("centre_regional", "=", $centre_regional)
                ->where("centre", "=", $centre)
                ->where("site", "=", $site)
                ->where("client", "=", $client)
                ->get();
        }
        return view('.regulation.facturation.liste', compact('regulations', 'centres', 'centres_regionaux',
            'clients', 'sites_com', 'centre', 'centre_regional', 'client', 'site', 'debut', 'fin', 'libelle'));
    }*/

    public function liste(Request $request)
    {
        $regulations = RegulationFacturationItem::with('facture')->get();

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients = Commercial_client::orderBy('client_nom')->get();
        $sites_com = Commercial_site::orderBy('site')->get();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $client = $request->get("client");
        $site = $request->get("site");
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $libelle = $request->get("libelle");

        if (isset($debut) && isset($fin)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin) {
                    $query->whereBetween("date", [$debut, $fin]);
                })
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        if (isset($client)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($client) {
                    $query->where("client", "=", $client);
                })
                ->get();
        }

        if (isset($site)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($site) {
                    $query->where("site", "=", $site);
                })
                ->get();
        }

        if (isset($libelle)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        if (isset($centre)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($centre) {
                    $query->where("centre", "=", $centre);
                })
                ->get();
        }

        if (isset($centre_regional)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($centre_regional) {
                    $query->where("centre_regional", "=", $centre_regional);
                })
                ->get();
        }

        if (isset($centre_regional) &&  isset($centre)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($centre_regional, $centre) {
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                })
                ->get();
        }

        if (isset($centre_regional) && isset($centre) && isset($site)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($centre_regional, $centre, $site) {
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                    $query->where("site", "=", $site);
                })
                ->get();
        }

        if (isset($centre_regional) && isset($centre) && isset($client)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($centre_regional, $centre, $client) {
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                    $query->where("client", "=", $client);
                })
                ->get();
        }

        if (isset($centre_regional) &&  isset($centre) && isset($client) && isset($site)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('facture', function (Builder $query) use ($centre_regional, $centre, $client, $site) {
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                    $query->where("client", "=", $client);
                    $query->where("site", "=", $site);
                })
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($client)) {
            $regulations = RegulationFacturationItem::with('facture')
                    ->whereHas('facture', function (Builder $query) use ($debut, $fin, $client) {
                        $query->whereBetween("date", [$debut, $fin]);
                        $query->where("client", "=", $client);
                    })
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($client) && isset($libelle)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $client) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("client", "=", $client);
                })
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $client, $site) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("client", "=", $client);
                    $query->where("site", "=", $site);
                })
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site) && isset($libelle)) {
            $regulations = RegulationFacturation::with('clients')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $site) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("site", "=", $site);
                })
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($libelle)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin) {
                    $query->whereBetween("date", [$debut, $fin]);
                })
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site) && isset($client)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $client, $site) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("client", "=", $client);
                    $query->where("site", "=", $site);
                })
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $centre, $centre_regional) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                })
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional) && isset($libelle)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $centre, $centre_regional) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                })
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional) && isset($site) && isset($client)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $centre, $centre_regional, $client, $site) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                    $query->where("site", "=", $site);
                    $query->where("client", "=", $client);
                })
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($centre) && isset($centre_regional) && isset($site) && isset($client) && isset($libelle)) {
            $regulations = RegulationFacturationItem::with('facture')
                ->whereHas('facture', function (Builder $query) use ($debut, $fin, $centre, $centre_regional, $client, $site) {
                    $query->whereBetween("date", [$debut, $fin]);
                    $query->where("centre_regional", "=", $centre_regional);
                    $query->where("centre", "=", $centre);
                    $query->where("site", "=", $site);
                    $query->where("client", "=", $client);
                })
                ->where('libelle', 'like', '%' . $libelle . '%')
                ->get();
        }

        return view('.regulation.facturation.liste', compact('regulations', 'centres', 'centres_regionaux',
            'clients', 'sites_com', 'centre', 'centre_regional', 'client', 'site', 'debut', 'fin', 'libelle'));
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
            'site' => $request->get('site'),
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
                    'pu' => $pu[$i],
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
        $clients = Commercial_client::orderBy("client_nom")->get();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $items = RegulationFacturationItem::where('facturation', $id)->get();
        $sites = Commercial_site::orderBy("site")->get();
        return view('.regulation.facturation.edit', compact('regulation', 'clients', 'centres', 'centres_regionaux', 'items', 'sites'));
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
        $data->site = $request->get("site");
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
                        'pu' => $pu[$i],
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
                        $item->pu = $pu[$i];
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
