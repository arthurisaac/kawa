<?php

namespace App\Http\Controllers;

use App\Models\ArriveeTournee;
use App\Models\Convoyeur;
use App\Models\DepartTournee;
use App\Models\Personnel;
use App\Models\SiteArriveeTournee;
use App\Models\SiteDepartTournee;
use App\Models\VidangeGenerale;
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
        return view('transport.arrivee-tournee.index', compact('departTournees', 'convoyeurs', 'personnels', 'sites', 'vidanges'));
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
        $request->validate([
            'numeroTournee' => 'required',
        ]);

        $tournee = DepartTournee::find($request->get('numeroTournee'));
        $tournee->kmArrivee = $request->get('kmArrivee');
        $tournee->heureArrivee = $request->get('heureArrivee');
        $tournee->save();

        $sites = $request->get('site');
        $site_ids = $request->get('site_id');
        $bordereaux = $request->get('bordereau');
        $montants = $request->get('montant');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $site = SiteDepartTournee::find($site_ids[$i]);
                $site->bordereau = $bordereaux[$i];
                $site->montant = $montants[$i];
                $site->save();
            }
        }
        return redirect('/arrivee-tournee')->with('success', 'Tournée enregistrée!');
        /*$arriveeTournee = new ArriveeTournee([
            'numeroTournee' => $request->get('numeroTournee'),
            'convoyeur1' => $request->get('convoyeur1'),
            'convoyeur2' => $request->get('convoyeur2'),
            'convoyeur3' => $request->get('convoyeur3'),
            'kmDepart' => $request->get('kmDepart'),
            'heureDepart' => $request->get('heureDepart'),
            'kmArrivee' => $request->get('kmArrivee'),
            'heureArrivee' => $request->get('heureArrivee'),
            'vidangeGenerale' => $request->get('vidangeGenerale'),
            'visiteTechnique' => $request->get('visiteTechnique'),
            'vidangeCourroie' => $request->get('vidangeCourroie'),
            'patente' => $request->get('patente'),
            'assuranceFin' => $request->get('assuranceFin'),
            'assuranceHeurePont' => $request->get('assuranceHeurePont'),
        ]);
        $arriveeTournee->save();

        $sites = $request->get('site');
        $bords = $request->get('bord');
        $montants = $request->get('montant');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $siteArriveeTournee = new SiteArriveeTournee([
                    'idTourneeArrivee' => $arriveeTournee->id,
                    'site' => $sites[$i],
                    'bord' => $bords[$i],
                    'montant' => $montants[$i],
                ]);
                $siteArriveeTournee->save();
            }
        }
        return redirect('/arrivee-tournee')->with('success', 'Tournée enregistrée!');*/
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
        //
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
        //
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
