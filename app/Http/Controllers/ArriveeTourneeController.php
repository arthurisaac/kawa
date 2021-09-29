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



    public function liste()
    {
        $departTournee = DepartTournee::with('vehicules')
            ->orderByDesc("created_at")
            ->get();
        return view('transport.arrivee-tournee.liste',
            compact('departTournee'));
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
        $autre = $request->get('autre');
        $site_ids = $request->get('site_id');
        $bordereaux = $request->get('bordereau');
        $montants = $request->get('montant');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $site = SiteDepartTournee::find($site_ids[$i]);
                $site->bordereau = $bordereaux[$i];
                $site->montant = $montants[$i];
                $site->type = $type[$i];
                $site->autre = $autre[$i];
                $site->save();
            }
        }
        return redirect('/arrivee-tournee')->with('success', 'Tournée enregistrée!');
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
        $autre = $request->get('autre');
        $site_ids = $request->get('site_id');
        $bordereaux = $request->get('bordereau');
        $montants = $request->get('montant');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $site = SiteDepartTournee::find($site_ids[$i]);
                $site->bordereau = $bordereaux[$i];
                $site->montant = $montants[$i];
                $site->type = $type[$i];
                $site->autre = $autre[$i];
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
