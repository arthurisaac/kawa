<?php

namespace App\Http\Controllers;

use App\ArriveeCentre;
use App\ArriveeSite;
use App\Centre;
use App\Centre_regional;
use App\DepartCentre;
use App\DepartSite;
use App\DepartSiteColis;
use App\DepartTournee;
use App\TourneeCentre;
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
        $departSites = DepartSite::all();
        $arriveeCentres = ArriveeCentre::all();
        // $tourneeCentres = TourneeCentre::all();
        $tourneeCentres = TourneeCentre::
            with('personnesChef')
            ->with('personnesChauffeur')
            ->with('personnesDeGarde')
            ->with('vehicules')
            ->get();
        return view('/securite/maincourante.index',
            compact('centres', 'centres_regionaux', 'agents', 'chefBords', 'chauffeurs',
                'vehicules', 'tournees', 'departCentres', 'arriveeSites',
                'departSites', 'arriveeCentres', 'tourneeCentres'));
    }

    public function liste()
    {
        $departCentres = DepartCentre::all();
        $arriveeSites = ArriveeSite::all();
        $departSites = DepartSite::all();
        $arriveeCentres = ArriveeCentre::all();

        return view('/securite/maincourante.liste',
            compact('departCentres', 'arriveeSites', 'arriveeCentres', 'departSites'));
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
    }

    public function storeDepartSite(Request $request)
    {
        $numeroSite = $request->get('numeroSite');
        $site = $request->get('site');
        $date = $request->get('date');
        $vehicule = $request->get('vehicule');
        $chefDeBord = $request->get('chefDeBord');
        $chauffeur = $request->get('chauffeur');
        $finOp = $request->get('finOp');
        $heureDepart = $request->get('heureDepart');
        $kmDepart = $request->get('kmDepart');
        $bordereau = $request->get('bordereau');
        $destination = $request->get('destination');
        $observation = $request->get('observation');

        for ($i = 0; $i < count($site); $i++) {
            if (!empty($site[$i])) {
                $departSite = new DepartSite([
                    'numeroSite' => $numeroSite[$i],
                    'site' => $site[$i],
                    'date' => $date[$i],
                    'vehicule' => $vehicule[$i],
                    'chefDeBord' => $chefDeBord[$i],
                    'chauffeur' => $chauffeur[$i],
                    'finOp' => $finOp[$i],
                    'heureDepart' => $heureDepart[$i],
                    'kmDepart' => $kmDepart[$i],
                    'bordereau' => $bordereau[$i],
                    'observation' => $observation[$i],
                    'destination' => $destination[$i],
                ]);
                $departSite->save();
                $this->storeDepartSiteColis($request, $departSite->id);
            }
        }
    }

    public function storeDepartSiteColis(Request $request, $id)
    {

        $totalColis = $request->get('totalColis');
        $typeColisSecuripack = $request->get('typeColisSecuripack');
        $typeColisSacjute = $request->get('typeColisSacjute');
        $nombreColisSecuripack = $request->get('nombreColisSecuripack');
        $nombreColisSacjute = $request->get('nombreColisSacjute');
        $numeroScelleSecuripack = $request->get('numeroScelleSecuripack');
        $numeroScelleSacjute = $request->get('numeroScelleSacjute');
        $montantAnnonceSecuripack = $request->get('montantAnnonceSecuripack');
        $montantAnnonceSacjute = $request->get('montantAnnonceSacjute');

        for ($i = 0; $i < count($totalColis); $i++) {
            if (!empty($totalColis[$i])) {
                $departSite = new DepartSiteColis([
                    'departSite' => $id,
                    'totalColis' => $totalColis[$i],
                    'typeColisSecuripack' => $typeColisSecuripack[$i],
                    'typeColisSacjute' => $typeColisSacjute[$i],
                    'nombreColisSecuripack' => $nombreColisSecuripack[$i],
                    'nombreColisSacjute' => $nombreColisSacjute[$i],
                    'numeroScelleSecuripack' => $numeroScelleSecuripack[$i],
                    'numeroScelleSacjute' => $numeroScelleSacjute[$i],
                    'montantAnnonceSecuripack' => $montantAnnonceSecuripack[$i],
                    'montantAnnonceSacjute' => $montantAnnonceSacjute[$i],
                ]);
                $departSite->save();
            }
        }
    }

    public function storeArriveeCentre(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'tournee'=>'required',
            'vehicule'=>'required',
            'chefDeBord'=>'required',
            'agentDeGarde'=>'required',
            'chauffeur'=>'required',
        ]);

        $arriveeCentre = new ArriveeCentre([
            'date' => $request->get('date'),
            'tournee' => $request->get('tournee'),
            'vehicule' => $request->get('vehicule'),
            'chefDeBord' => $request->get('chefDeBord'),
            'agentDeGarde' => $request->get('agentDeGarde'),
            'chauffeur' => $request->get('chauffeur'),
            'heureArrivee' => $request->get('heureArrivee'),
            'kmArrive' => $request->get('kmArrive'),
            'observation' => $request->get('observation'),
        ]);
        $arriveeCentre->save();
    }

    public function storeTourneeCentre(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'tournee'=>'required',
            'vehicule'=>'required',
            'chefDeBord'=>'required',
            'agentDeGarde'=>'required',
            'chauffeur'=>'required',
        ]);

        $arriveeCentre = new TourneeCentre([
            'date' => $request->get('date'),
            'tournee' => $request->get('tournee'),
            'vehicule' => $request->get('vehicule'),
            'chefDeBord' => $request->get('chefDeBord'),
            'agentDeGarde' => $request->get('agentDeGarde'),
            'chauffeur' => $request->get('chauffeur'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'dateDebut' => $request->get('dateDebut'),
            'dateFin' => $request->get('dateFin'),
        ]);
        $arriveeCentre->save();
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
            case 'departSite':
                $this->storeDepartSite($request);
                break;
            case 'arriveeCentre':
                $this->storeArriveeCentre($request);
                break;
            case 'tourneeCentre':
                $this->storeTourneeCentre($request);
                break;
        }
        return redirect('/maincourante')->with('success', 'Enregistrement effectué!');

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
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        return redirect('/maincourante')->with('success', 'Enregistrement supprimé!');
    }

    public function search(Request $request) {

        if ($request->ajax()) {
            return DepartSite::where('numeroSite', $request->numeroSite)->get();
        }

    }

    public function deleteDepartSite(Request $request) {

        if ($request->ajax()) {
            $departSite = DepartSite::find($request->id);
            $departSite->delete();
            return $departSite;
        }

    }
}
