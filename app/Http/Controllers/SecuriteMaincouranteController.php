<?php

namespace App\Http\Controllers;

use App\ArriveeSite;
use App\Centre;
use App\Centre_regional;
use App\DepartCentre;
use App\DepartTournee;
use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SecuriteMaincouranteController extends Controller
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
        $agents = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        $chefBords = DB::table('personnels')->where('transport', '=', 'Chef de bord')->get();
        $chauffeurs = DB::table('personnels')->where('transport', '=', 'Chauffeur')->get();
        $vehicules = Vehicule::all();
        $tournees = DepartTournee::all();
        $departCentres = DepartCentre::all();
        $arriveeSites = ArriveeSite::all();

        return view('/securite/maincourante.index',
            compact('centres', 'centres_regionaux', 'agents', 'chefBords', 'chauffeurs', 'vehicules', 'tournees', 'departCentres', 'arriveeSites'));
    }

    public function liste()
    {
        $departCentres = DepartCentre::all();
        $arriveeCentres = ArriveeSite::all();
        return view('/securite/maincourante.liste', compact('departCentres', 'arriveeCentres'));
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
    public function storeDepartCentre(Request $request)
    {
        $departCentre = new DepartCentre([
            'date' => $request->get('date'),
            'noTournee' => $request->get('noTournee'),
            'vehicule' => $request->get('vehicule'),
            'chefDeBord' => $request->get('chefDeBord'),
            'agentDeGarde' => $request->get('agentDeGarde'),
            'chauffeur' => $request->get('chauffeur'),
            'heureDepart' => $request->get('heureDepart'),
            'kmDepart' => $request->get('kmDepart'),
            'observation' => $request->get('observation'),
        ]);
        $departCentre->save();
        // return redirect('/maincourante')->with('success', 'Depart centre enregistré!');
    }

    public function storeArriveeSite(Request $request)
    {
        $numeroSite = $request->get('numeroSite');
        $site = $request->get('site');
        $date = $request->get('date');
        $vehicule = $request->get('vehicule');
        $chefDeBord = $request->get('chefDeBord');
        $chauffeur = $request->get('chauffeur');
        $heureDepart = $request->get('heureDepart');
        $kmDepart = $request->get('kmDepart');
        $observation = $request->get('observation');

        for ($i = 0; $i < count($site); $i++) {
            if (!empty($site[$i])) {
                $arriveeCentre = new ArriveeSite([
                    'numeroSite' => $numeroSite[$i],
                    'site' => $site[$i],
                    'date' => $date[$i],
                    'vehicule' => $vehicule[$i],
                    'chefDeBord' => $chefDeBord[$i],
                    'chauffeur' => $chauffeur[$i],
                    'heureDepart' => $heureDepart[$i],
                    'kmDepart' => $kmDepart[$i],
                    'observation' => $observation[$i]
                ]);
                $arriveeCentre->save();
            }
        }
        // return redirect('/maincourante')->with('success', 'Arrivée centre enregistré!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $maincourante = $request->get('maincourante');
        switch ($maincourante) {
            case 'departCentre':
                $this->storeDepartCentre($request);
                break;
            case 'arriveeSite':
                $this->storeArriveeSite($request);
                break;
        }
        return redirect('/maincourante')->with('success', 'Arrivée centre enregistré!');

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
        //
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
        //
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
