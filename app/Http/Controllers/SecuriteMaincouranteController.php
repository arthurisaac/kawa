<?php

namespace App\Http\Controllers;

use App\Models\ArriveeCentre;
use App\Models\ArriveeSite;
use App\Models\ArriveeSiteColis;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_site;
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
        $sites = Commercial_site::all();
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
                'departSites', 'arriveeCentres', 'tourneeCentres', 'sitesDepartTournees', 'date', 'sites'));
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
        $departSites = DepartSite::with("tournees")->get();
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
        $arrivee = new ArriveeSite([
            'noTournee' => $request->get('noTournee'),
            'site' => $request->get('site'),
            'operation' => $request->get('operation'),
            'dateArrivee' => $request->get('dateArrivee'),
            'heureArrivee' => $request->get('heureArrivee'),
            'debutOperation' => $request->get('debutOperation'),
            'finOperation' => $request->get('finOperation'),
            'tempsOperation' => $request->get('tempsOperation'),
            'nombre_colis' => $request->get('asNbColis'),
            /*'noBordereau' => $request->get('noBordereau'),
            'heureArrivee' => $request->get('heureArrivee'),
            'kmArrivee' => $request->get('kmArrivee'),
            'observation' => $request->get('observation'),*/
        ]);
        $arrivee->save();

        $asColis = $request->get('asColis');
        $asNbColis = $request->get('asNbColis');
        $asNumColis = $request->get('asNumColis');
        $asNumBordereau = $request->get('asNumBordereau');
        $asMontantAnnonce = $request->get('asMontantAnnonce');
        $asNatureColis = $request->get('asNatureColis');

        for ($i = 0; $i < count($asNumColis); $i++) {
            //if (!empty($asNbColis[$i])) {
            $as = new ArriveeSiteColis([
                'arrivee_site' => $arrivee->id,
                'site' => $asNbColis[$i],
                'colis' => $asColis[$i],
                'num_colis' => $asNumColis[$i],
                'bordereau' => $asNumBordereau[$i],
                'montant' => $asMontantAnnonce[$i],
                'nature' => $asNatureColis[$i],
            ]);
            $as->save();
            //}
        }
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
        $departSite = $request->get('departSite');
        $destination = $request->get('destination');
        $observation = $request->get('observation');

        $data = new DepartSite([
            'noTournee' => $noTournee,
            'site' => $site,
            'heureDepart' => $heureDepart,
            'kmDepart' => $kmDepart,
            'depart_site' => $departSite,
            'observation' => $observation,
            'destination' => $destination,
        ]);
        $data->save();

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

    public function editArriveeSite(Request $request, $id)
    {
        $site = ArriveeSite::with('sites')->find($id);
        $arriveeColis = ArriveeSiteColis::all()->where('arrivee_site', '=', $id);
        $sites = Commercial_site::all();
        return view('securite.maincourante.arrivee-site.edit', compact('site', 'sites', 'arriveeColis'));
    }

    public function editDepartSite(Request $request, $id)
    {
        $site = DepartSite::all()->find($id);
        return view('securite.maincourante.depart-site.edit', compact('site'));
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

    public function updateArriveeColis(Request $request, $id)
    {
        $arrivee = ArriveeSite::find($id);
        $arrivee->site = $request->get('asSite');
        $arrivee->operation = $request->get('asTypeOperation');
        $arrivee->dateArrivee = $request->get('asDateArrivee');
        $arrivee->heureArrivee = $request->get('asHeureArrivee');
        $arrivee->debutOperation = $request->get('asDebutOperation');
        $arrivee->finOperation = $request->get('asFinOperation');
        $arrivee->tempsOperation = $request->get('asTempsOperation');
        $arrivee->nombre_colis = $request->get('asNbColis');
        $arrivee->save();

        $asColis_edit = $request->get('asColis_edit');
        $asNumColis_edit = $request->get('asNumColis_edit');
        $asNumBordereau_edit = $request->get('asNumBordereau_edit');
        $asMontantAnnonce_edit = $request->get('asMontantAnnonce_edit');
        $asNatureColis_edit = $request->get('asNatureColis_edit');
        $ids = $request->get('colis_id');

        for ($i = 0; $i < count($asNumColis_edit); $i++) {
            if (!empty($asNumColis_edit[$i])) {
                $as = ArriveeSiteColis::find($ids[$i]);
                $as->arrivee_site = $id;
                $as->colis = $asColis_edit[$i];
                $as->num_colis = $asNumColis_edit[$i];
                $as->bordereau = $asNumBordereau_edit[$i];
                $as->montant = $asMontantAnnonce_edit[$i];
                $as->nature = $asNatureColis_edit[$i];
                $as->save();
            }
        }

        $asColis = $request->get('asColis');
        $asNumColis = $request->get('asNumColis');
        $asNumBordereau = $request->get('asNumBordereau');
        $asMontantAnnonce = $request->get('asMontantAnnonce');
        $asNatureColis = $request->get('asNatureColis');

        for ($i = 0; $i < count($asNumColis); $i++) {
            if (!empty($asNumColis[$i])) {
                $as = new ArriveeSiteColis([
                    'arrivee_site' => $id,
                    'colis' => $asColis[$i],
                    'num_colis' => $asNumColis[$i],
                    'bordereau' => $asNumBordereau[$i],
                    'montant' => $asMontantAnnonce[$i],
                    'nature' => $asNatureColis[$i],
                ]);
                $as->save();
            }
        }

        return redirect()->back()->with('success', 'Enregistré');
    }

    public function updateDepartSite(Request $request, $id)
    {
        $heureDepart = $request->get('heureDepart');
        $kmDepart = $request->get('kmDepart');
        $departSite = $request->get('departSite');
        $destination = $request->get('destination');
        $observation = $request->get('observation');

        $data = DepartSite::find($id);
        $data->heureDepart = $heureDepart;
        $data->kmDepart = $kmDepart;
        $data->depart_site = $departSite;
        $data->observation = $observation;
        $data->destination = $destination;
        $data->save();
        return redirect()->back()->with('success', 'Mise à jour réussie');
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

    public function deleteArriveeSite(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = ArriveeSite::find($id);
            $data->delete();
            return \response()->json([
                'message' => 'supprimé'
            ]);
        }
    }
}
