<?php

namespace App\Http\Controllers;

use App\Models\ArriveeCentre;
use App\Models\ArriveeSite;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\DepartCentre;
use App\Models\DepartSite;
use App\Models\DepartSiteColis;
use App\Models\DepartTournee;
use App\Models\SiteDepartTournee;
use App\Models\TourneeCentre;
use App\Models\Vehicule;
use Exception;
use Illuminate\Http\JsonResponse;
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
        $date = date('d/m/Y');
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        $departCentres = DepartCentre::with('tournees')->get();
        $arriveeSites = ArriveeSite::with('sites')->with('tournees')->get();
        $departSites = DepartSite::with('tournees')->get();
        $sitesDepartTournees = SiteDepartTournee::with('tournees')->with('sites')->get();
        $arriveeCentres = ArriveeCentre::with('tournees')->get();
        $tourneeCentres = TourneeCentre::with('tournees')
            ->with('details')
            ->get();
        return view('/securite.maincourante.index',
            compact('centres', 'centres_regionaux',
                'tournees', 'departCentres', 'arriveeSites',
                'departSites', 'arriveeCentres', 'tourneeCentres', 'sitesDepartTournees', 'date'));
    }

    public function liste()
    {
        $departCentres = DepartCentre::all();
        $arriveeSites = ArriveeSite::all();
        $departSites = DepartSite::all();
        $arriveeCentres = ArriveeCentre::all();

        return view('/securite.maincourante.liste',
            compact('departCentres', 'arriveeSites', 'arriveeCentres', 'departSites'));
    }

    public function arriveeSiteListe()
    {
        $arriveeSites = ArriveeSite::all();

        return view('/securite.maincourante.arrivee-site.liste',
            compact('arriveeSites'));
    }

    public function departCentreListe()
    {
        $departCentres = DepartCentre::all();

        return view('/securite.maincourante.depart-centres.liste',
            compact('departCentres'));
    }

    public function departSiteListe()
    {
        $departSites = DepartSite::all();

        return view('/securite.maincourante.depart-site.liste',
            compact('departSites'));
    }

    public function arriveeCentreListe()
    {
        $arriveeCentres = ArriveeCentre::all();

        return view('/securite.maincourante.arrivee-centre.liste',
            compact('arriveeCentres'));
    }

    public function tourneeCentreListe()
    {
        $tourneeCentres = TourneeCentre::with('tournees');

        return view('/securite.maincourante.tournee-centre.liste',
            compact('tourneeCentres'));
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
            'heureDepart' => $request->get('heureDepart'),
            'kmDepart' => $request->get('kmDepart'),
            'observation' => $request->get('observation'),
            'niveauCarburant' => $request->get('niveauCarburant'),
        ]);
        $departCentre->save();
    }

    public function storeArriveeSite(Request $request)
    {
        $arriveeCentre = new ArriveeSite([
            'noTournee' => $request->get('noTournee'),
            'site' => $request->get('site'),
            'noBordereau' => $request->get('noBordereau'),
            'heureArrivee' => $request->get('heureArrivee'),
            'kmArrivee' => $request->get('kmArrivee'),
            'observation' => $request->get('observation'),
        ]);
        $arriveeCentre->save();
    }

    public function storeDepartSite(Request $request)
    {
        $request->validate([
            'noTournee' => 'required',
            'site' => 'required',
        ]);
        $noTournee = $request->get('noTournee');
        // $numeroSite = $request->get('numeroSite');
        $site = $request->get('site');
        $heureDepart = $request->get('heureDepart');
        $kmDepart = $request->get('kmDepart');
        $bordereau = $request->get('bordereau');
        $destination = $request->get('destination');
        $observation = $request->get('observation');

        $departSite = new DepartSite([
            'noTournee' => $noTournee,
            'site' => $site,
            'heureDepart' => $heureDepart,
            'kmDepart' => $kmDepart,
            'bordereau' => $bordereau,
            'observation' => $observation,
            'destination' => $destination,
        ]);
        $departSite->save();

       /* for ($i = 0; $i < count($site); $i++) {
            if (!empty($site[$i])) {
                $departSite = new DepartSite([
                    'noTournee' => $noTournee,
                    'numeroSite' => $numeroSite[$i],
                    'site' => $site,
                    'heureDepart' => $heureDepart[$i],
                    'kmDepart' => $kmDepart[$i],
                    'bordereau' => $bordereau[$i],
                    'observation' => $observation[$i],
                    'destination' => $destination[$i],
                ]);
                $departSite->save();
                // $this->storeDepartSiteColis($request, $departSite->id);
            }
        }*/
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
        $arriveeCentre = new ArriveeCentre([
            'noTournee' => $request->get('noTournee'),
            'heureArrivee' => $request->get('heureArrivee'),
            'kmArrive' => $request->get('kmArrive'),
            'observation' => $request->get('observation'),
        ]);
        $arriveeCentre->save();
    }

    public function storeTourneeCentre(Request $request)
    {

        $arriveeCentre = new TourneeCentre([
            'noTournee' => $request->get('noTournee'),
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
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'noTournee' => 'required',
        ]);
        $maincourante = $request->get('maincourante');
        switch ($maincourante) {
            case 'departCentre':
                $this->storeDepartCentre($request);
                break;
            case 'arriveeSite':
                try {
                    $this->storeArriveeSite($request);
                } catch (Exception $e) {
                    return \response()->json($e);
                }
                break;
            case 'departSite':
                try {
                    $this->storeDepartSite($request);
                } catch (Exception $e) {
                    return \response()->json($e);
                }
                break;
            case 'arriveeCentre':
                try {
                    $this->storeArriveeCentre($request);
                } catch (Exception $e) {
                    return \response()->json($e);
                }
                break;
            case 'tourneeCentre':
                try {
                    $this->storeTourneeCentre($request);
                } catch (Exception $e) {
                    return \response()->json($e);
                }
                break;
        }
        // return redirect('/maincourante')->with('success', 'Enregistrement effectué!');
        return \response()->json($maincourante);
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
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        return redirect('/maincourante')->with('success', 'Enregistrement supprimé!');
    }

    public function search(Request $request)
    {

        if ($request->ajax()) {
            return DepartSite::where('numeroSite', $request->numeroSite)->get();
        }

    }

    public function deleteDepartSite(Request $request)
    {

        if ($request->ajax()) {
            $departSite = DepartSite::find($request->id);
            $departSite->delete();
            return $departSite;
        }

    }
    public function deleteDepartCentre(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = DepartCentre::find($id);
            $data->delete();
            return \response()->json([
                'message' => 'supprimé'
            ]);
        }

    }
}
