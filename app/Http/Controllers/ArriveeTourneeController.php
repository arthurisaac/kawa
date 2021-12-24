<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Convoyeur;
use App\Models\Personnel;
use App\Models\OptionDevise;
use Illuminate\Http\Request;
use App\Models\DepartTournee;
use App\Models\VidangeVisite;
use Illuminate\Http\Response;
use App\Models\ArriveeTournee;
use App\Models\VidangePatente;
use App\Models\Centre_regional;
use App\Models\Commercial_site;
use App\Models\VidangeCourroie;
use App\Models\VidangeGenerale;
use App\Models\VidangeVignette;
use App\Models\VidangeAssurance;
use App\Models\VidangeHuilePont;
use App\Models\VidangeTransport;
use App\Models\Commercial_client;
use App\Models\SiteDepartTournee;
use App\Models\SiteArriveeTournee;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ArriveeTourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departTournees = DepartTournee::with('agentDeGardes')
            ->with('chefDeBords')
            ->with('chauffeurs')
            ->with('vehicules')
            ->orderByDesc('id')
            ->get();
        $convoyeurs = Convoyeur::all();
        $personnels = Personnel::all();
        $sites = SiteDepartTournee::with('sites')->get();
        $vidanges = VidangeGenerale::all();
        $vidangePonts = VidangeHuilePont::all();
        $vidangePatentes = VidangePatente::all();
        $vidangeVisite = VidangeVisite::all();
        $vidangeCourroie = VidangeCourroie::all();
        $vidangeVignette = VidangeVignette::all();
        $assurances = VidangeAssurance::all();
        $devises = OptionDevise::all();

        return view('transport.arrivee-tournee.index',
            compact('departTournees', 'convoyeurs', 'personnels', 'sites', 'vidanges', 'vidangePonts', 'vidangeCourroie', 'vidangeVignette', 'vidangeVisite', 'vidangePatentes', 'assurances', 'devises'));
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


    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $departTournee = DepartTournee::with('vehicules')
            ->with('arriveeSites')
            ->orderByDesc("created_at")
            ->get();
        if (isset($debut) && isset($fin)) {
            $departTournee = DepartTournee::with('vehicules')
                ->whereBetween('date', [$debut, $fin])
                ->orderByDesc("created_at")
                ->get();
        }
        return view('transport.arrivee-tournee.liste', compact('departTournee'));
    }

    public function listeColisArrivee(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $client = $request->get("client");
        $site = $request->get("site");

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients = Commercial_client::orderBy('client_nom')->get();
        $sites_com = Commercial_site::orderBy('site')->get();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");

        $colisArrivees = SiteDepartTournee::with('sites')
            ->orderByDesc("created_at")
            ->get();

        if (isset($debut) && isset($fin)) {
            $colisArrivees = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($fin, $debut) {
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

        if (isset($debut) && isset($fin)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->get();
        }

        if (isset($debut) && isset($fin)) {
            $colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->get();
        }

        if (isset($debut) && isset($fin) && isset($site) && isset($centre) && isset($centre_regional)) {
            $$colisArrivees = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_arrivee_tournees.site', 'like', '%' . $site . '%')
                ->where('depart_tournees.centre_regional', 'like', '%' . $centre_regional . '%')
                ->where('depart_tournees.centre', 'like', '%' . $centre . '%')
                ->get();
        }

        return view('transport.arrivee-tournee.colis-arrivee', compact('centres', 'centres_regionaux', 'clients', 'sites_com',
            'site', 'client', 'debut', 'fin', 'centre', 'centre_regional', 'colisArrivees'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroTournee' => 'required',
        ]);

        $tournee = DepartTournee::find($request->get('numeroTournee'));
        $tournee->kmArrivee = $request->get('kmArrivee');
        $tournee->heureArrivee = $request->get('heureArrivee');
        $tournee->save();

        $sites = $request->get('site');
        $type = $request->get('type');
        //$autre = $request->get('autre');
        $site_ids = $request->get('site_id');
        $bordereaux = $request->get('bordereau');
        $montants = $request->get('montant');


        $colis = $request->get('colis');
        $transport_arrivee_devise = $request->get('transport_arrivee_devise');
        $transport_arrivee_valeur_colis = $request->get('transport_arrivee_valeur_colis');
        //$valeur_colis_xof = $request->get('valeur_colis_xof');
        //$device_etrangere_dollar = $request->get('device_etrangere_dollar');
        //$device_etrangere_euro = $request->get('device_etrangere_euro');
        //$pierre_precieuse = $request->get('pierre_precieuse');

        $numero = $request->get('numero');
        $nbre_colis = $request->get('nbre_colis');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $site = SiteDepartTournee::find($site_ids[$i]);
                $site->bordereau = $bordereaux[$i] ?? "";
                $site->montant = $montants[$i] ?? 0;
                $site->type = $type[$i] ?? "";

                $site->colis = $colis[$i] ?? "";
                $site->numero = $numero[$i] ?? "";
                $site->nbre_colis_arrivee = $nbre_colis[$i] ?? 0;
                $site->transport_arrivee_devise = $transport_arrivee_devise[$i];
                $site->transport_arrivee_valeur_colis = str_replace(' ', '', $transport_arrivee_valeur_colis[$i]);
                //$site->valeur_colis_xof_arrivee = str_replace(' ', '', $valeur_colis_xof[$i]) ?? null;

                //$site->device_etrangere_dollar_arrivee = str_replace(' ', '', $device_etrangere_dollar[$i]) ?? null;
                //$site->device_etrangere_euro_arrivee = str_replace(' ', '',$device_etrangere_euro[$i]) ?? null;
                //$site->pierre_precieuse_arrivee = str_replace(' ', '',$pierre_precieuse[$i]) ?? null;

                $site->save();
            }
        }

        // Vidange generale
        if ($request->get("vidangeGeneraleID") && $request->get("vidangeGenerale")) {
            $vidange = VidangeGenerale::find($request->get("vidangeGeneraleID"));
            if ($vidange) {
                $vidange->prochainKm = $request->get("vidangeGenerale");
                $vidange->save();
            }
        }

        // Vidange courroie
        if ($request->get("vidangeCourroieID") && $request->get("vidangeCourroie")) {
            $vidange = VidangeCourroie::find($request->get("vidangeCourroieID"));
            if ($vidange) {
                $vidange->prochainKm = $request->get("vidangeCourroie");
                $vidange->save();
            }
        }

        // Vidange pont
        if ($request->get("vidangePontID") && $request->get("vidangePont")) {
            $vidange = VidangeHuilePont::find($request->get("vidangePontID"));
            if ($vidange) {
                $vidange->prochainKm = $request->get("vidangePont");
                $vidange->save();
            }
        }

        return redirect('/arrivee-tournee-liste')->with('success', 'Tournée enregistrée!');
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
        $departTournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        $tournee = DepartTournee::with("sites")->find($id);
        $convoyeurs = Convoyeur::all();
        $personnels = Personnel::all();
        $sites = SiteDepartTournee::with('sites')->where("idTourneeDepart", $id)->get();
        $vidanges = VidangeGenerale::all();
        $devises = OptionDevise::all();
        return view('transport.arrivee-tournee.edit', compact('departTournees', 'tournee', 'convoyeurs', 'personnels', 'sites', 'vidanges', 'devises'));
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

        $tournee = DepartTournee::find($id);
        $tournee->kmArrivee = $request->get('kmArrivee');
        $tournee->heureArrivee = $request->get('heureArrivee');
        $tournee->save();

        $sites = $request->get('site');
        $type = $request->get('type');
        $site_ids = $request->get('site_id');
        $bordereaux = $request->get('bordereau');
        $montants = $request->get('montant');
        $colis = $request->get('colis');
        $transport_arrivee_devise = $request->get('transport_arrivee_devise');
        $transport_arrivee_valeur_colis = $request->get('transport_arrivee_valeur_colis');
        $numero = $request->get('numero');
        $nbre_colis = $request->get('nbre_colis');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $site = SiteDepartTournee::find($site_ids[$i]);
                $site->bordereau = $bordereaux[$i];
                $site->montant = $montants[$i];
                $site->type = $type[$i];

                $site->colis = $colis[$i];
                $site->numero_arrivee = $numero[$i];
                $site->nbre_colis_arrivee = $nbre_colis[$i];
                $site->transport_arrivee_devise = $transport_arrivee_devise[$i];
                $site->transport_arrivee_valeur_colis = str_replace(' ', '', $transport_arrivee_valeur_colis[$i]);

                $site->save();
            }
        }
        return redirect()->back()->with('success', 'Modification effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
