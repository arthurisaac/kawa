<?php

namespace App\Http\Controllers;

use App\Models\ArriveeTournee;
use App\Models\Convoyeur;
use App\Models\DepartTournee;
use App\Models\Personnel;
use App\Models\SiteArriveeTournee;
use App\Models\SiteDepartTournee;
use App\Models\VidangeAssurance;
use App\Models\VidangeCourroie;
use App\Models\VidangeGenerale;
use App\Models\VidangeHuilePont;
use App\Models\VidangePatente;
use App\Models\VidangeTransport;
use App\Models\VidangeVignette;
use App\Models\VidangeVisite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArriveeTourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departTournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
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

        return view('transport.arrivee-tournee.index',
            compact('departTournees', 'convoyeurs', 'personnels', 'sites', 'vidanges', 'vidangePonts', 'vidangeCourroie', 'vidangeVignette', 'vidangeVisite', 'vidangePatentes', 'assurances'));
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
        return view('transport.arrivee-tournee.liste',
            compact('departTournee'));
    }

    public function listeColisArrivee(Request $request)
    {
        $colisArrivees = SiteDepartTournee::with('sites')
            ->orderByDesc("created_at")
            ->get();
        return view('transport.arrivee-tournee.colis-arrivee',
            compact('colisArrivees'));
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
        $valeur_colis_xof = $request->get('valeur_colis_xof');
        $device_etrangere_dollar = $request->get('device_etrangere_dollar');
        $device_etrangere_euro = $request->get('device_etrangere_euro');
        $pierre_precieuse = $request->get('pierre_precieuse');
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
                $site->valeur_colis_xof_arrivee = $valeur_colis_xof[$i] ?? null;
                $site->device_etrangere_dollar_arrivee = $device_etrangere_dollar[$i] ?? null;
                $site->device_etrangere_euro_arrivee = $device_etrangere_euro[$i] ?? null;
                $site->pierre_precieuse_arrivee = $pierre_precieuse[$i] ?? null;

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
        return view('transport.arrivee-tournee.edit', compact('departTournees', 'tournee', 'convoyeurs', 'personnels', 'sites', 'vidanges'));
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
        //$autre = $request->get('autre');
        $site_ids = $request->get('site_id');
        $bordereaux = $request->get('bordereau');
        $montants = $request->get('montant');

        $colis = $request->get('colis');
        $valeur_colis_xof = $request->get('valeur_colis_xof');
        $device_etrangere_dollar = $request->get('device_etrangere_dollar');
        $device_etrangere_euro = $request->get('device_etrangere_euro');
        $pierre_precieuse = $request->get('pierre_precieuse');
        $numero = $request->get('numero');
        $nbre_colis = $request->get('nbre_colis');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $site = SiteDepartTournee::find($site_ids[$i]);
                $site->bordereau = $bordereaux[$i] ?? null;
                $site->montant = $montants[$i] ?? 0;
                $site->type = $type[$i] ?? null;

                $site->colis = $colis[$i] ?? "";
                $site->numero_arrivee = $numero[$i] ?? "";
                $site->nbre_colis_arrivee = $nbre_colis[$i] ?? 0;
                $site->valeur_colis_xof_arrivee = $valeur_colis_xof[$i] ?? null;
                $site->device_etrangere_dollar_arrivee = $device_etrangere_dollar[$i] ?? null;
                $site->device_etrangere_euro_arrivee = $device_etrangere_euro[$i] ?? null;
                $site->pierre_precieuse_arrivee = $pierre_precieuse[$i] ?? null;

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
