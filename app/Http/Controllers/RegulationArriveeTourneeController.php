<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\Convoyeur;
use App\Models\DepartTournee;
use App\Models\OptionDevise;
use App\Models\Personnel;
use App\Models\RegulationDepartTournee;
use App\Models\RegulationDepartTourneeItem;
use App\Models\SiteDepartTournee;
use App\Models\VidangeGenerale;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegulationArriveeTourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $date = date("Y/m/d");
        $heure = date("H:i");
        $tournees = DepartTournee::with('agentDeGardes')
            ->with('chefDeBords')
            ->with('chauffeurs')
            ->with('vehicules')
            ->get();
        $sites = SiteDepartTournee::with('sites')->get();
        $devises = OptionDevise::all();
        return view('regulation.arrivee-tournee.index', compact("date", "heure", "tournees", "sites", "devises"));
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $tournees = DepartTournee::with("sites")->get();
        if (isset($debut) && isset($fin)) {
            $tournees = DepartTournee::with("sites")
                ->whereBetween('date', [$debut, $fin])
                ->get();
        }
        return view("regulation.arrivee-tournee.liste", compact("tournees"));
    }

    public function listeColisArrivee(Request $request)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients = Commercial_client::orderBy('client_nom')->get();
        $sites_com = Commercial_site::orderBy('site')->get();
        $devises = OptionDevise::all();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $client = $request->get("client");
        $site = $request->get("site");
        $nature = $request->get("nature");
        $devise = $request->get("devise");

        $debut = $request->get("debut");
        $fin = $request->get("fin");

        $tournees = DepartTournee::all();
        $colisArrivees = SiteDepartTournee::with('sites')
            ->where('colis', '!=', 'RAS')
            ->orderByDesc("created_at")
            ->get();

        if (isset($debut) && isset($fin) )
        {
            $colisArrivees = SiteDepartTournee::where('colis', '!=', 'RAS')->whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->get();
        }
        if (isset($centre_regional)) {
            $colisArrivees = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($centre_regional) {
                $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
            })->get();
        }
        if (isset($centre)) {
            $colisArrivees = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($centre) {
                $query->where('centre', 'like', '%' . $centre . '%');
            })->get();
        }
        if (isset($client)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($client) {
                $query->where('client', 'like', '%' . $client . '%');
            })->get();
        }
        if (isset($site)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($site) {
                $query->where('id', 'like', '%' . $site . '%');
            })->get();
        }
        if (isset($nature)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($nature) {
                $query->where('nature', 'like', '%' . $nature . '%');
            })->get();
        }

        if (isset($debut) && isset($fin) && isset($site)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.site', 'like', '%' . $site . '%')
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($client)) {
            $colisArrivees = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($client) {
                $query->where('client', 'like', '%' . $client . '%');
            })->whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->get();
        }

        if (isset($debut) && isset($fin) && isset($devise)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.regulation_depart_devise', 'like', '%' . $devise . '%')
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($colis)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.colis', 'like', '%' . $colis . '%')
                ->get();
        }
        if (isset($debut) && isset($fin) && isset($site) && isset($centre) && isset($centre_regional)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.site', 'like', '%' . $site . '%')
                ->where('depart_tournees.centre_regional', 'like', '%' . $centre_regional . '%')
                ->where('depart_tournees.centre', 'like', '%' . $centre . '%')
                ->get();
        }

        return view('regulation.arrivee-tournee.colis-arrivee',
            compact('colisArrivees', 'tournees', 'centres', 'centres_regionaux', 'clients', 'centre', 'centre_regional', 'site', 'client', 'sites_com',
                'debut', 'fin', 'devises', 'nature', 'devise'));
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
        $sites = $request->get('site');
        $site_id = $request->get("site_id");
        $nature = $request->get('nature');
        $nbre_colis = $request->get('nbre_colis');
        $numero = $request->get('numero');


        $regulation_arrivee_valeur_colis = $request->get("regulation_arrivee_valeur_colis");
        $regulation_arrivee_devise = $request->get("regulation_arrivee_devise");
        $colis = $request->get('colis');

        //$client = $request->get('client');
        //$autre = $request->get('autre');
        //$numero_scelle = $request->get('numero_scelle');
        //$valeur_colis = $request->get('valeur_colis');

        //$valeur_autre = $request->get('valeur_autre');
        $dt = DepartTournee::find($request->get("idDepart"));
        $dt->heure_arrivee_regulation = $request->get("heure_arrivee_regulation");
        $dt->save();

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i]) ) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                //$dataSite->client = $client[$i];
                //$dataSite->autre = $autre[$i];
                //$dataSite->numero_scelle = $numero_scelle[$i];
                //$dataSite->montant_regulation = $montant[$i] ?? 0;
                //$dataSite->valeur_autre = $valeur_autre[$i];
                $dataSite->nbre_colis_arrivee = $nbre_colis[$i];
                $dataSite->nature = $nature[$i];
                $dataSite->colis_arrivee = $colis[$i];
                $dataSite->numero = $numero[$i];

                $dataSite->regulation_arrivee_valeur_colis = preg_replace("/\s+/ ", "", $regulation_arrivee_valeur_colis[$i]);
                $dataSite->regulation_arrivee_devise = $regulation_arrivee_devise[$i];

                $dataSite->save();
            }
        }

        return redirect("/regulation-arrivee-tournee-liste")->with('success', 'Enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tournee = DepartTournee::find($id);
        $tournees = RegulationDepartTournee::all();
        $sites = Commercial_site::with('clients')->get();
        $sitesItems = SiteDepartTournee::all()->where("idTourneeDepart", "=", $id);
        $devises = OptionDevise::all();
        return view('regulation.arrivee-tournee.edit', compact("tournee", "tournees", "sites", "sitesItems", "devises"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $sites = $request->get('site');
        $nbre_colis = $request->get('nbre_colis');

        $regulation_arrivee_valeur_colis = $request->get("regulation_arrivee_valeur_colis");
        $regulation_arrivee_devise = $request->get("regulation_arrivee_devise");

        $colis = $request->get('colis');
        $numero = $request->get('numero');
        $nature = $request->get('nature');
        $site_id = $request->get("site_id");

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $dataSite = SiteDepartTournee::find($site_id[$i]);
                $dataSite->nbre_colis_arrivee = $nbre_colis[$i] ?? 0;
                $dataSite->colis_arrivee = $colis[$i];
                $dataSite->numero = $numero[$i];
                $dataSite->nature = $nature[$i];

                $dataSite->regulation_arrivee_valeur_colis = str_replace(" ", "", $regulation_arrivee_valeur_colis[$i]);
                $dataSite->regulation_arrivee_devise = $regulation_arrivee_devise[$i];

                $dataSite->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
