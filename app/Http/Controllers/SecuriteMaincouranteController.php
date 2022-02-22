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
use App\Models\OptionBordereau;
use App\Models\OptionNiveauCarburant;
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
        $sites = Commercial_site::with('clients')->orderBy('site')->get();
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->orderByDesc('id')->get();
        $sitesTournees = SiteDepartTournee::with("sites")->get();
        $departCentres = DepartCentre::with('tournees')->get();
        $arriveeSites = ArriveeSite::with('sites')->with('tournees')->get();
        $departSites = DepartSite::with('tournees')->get();
        $sitesDepartTournees = SiteDepartTournee::with('tournees')->with('sites')->get();
        $arriveeCentres = ArriveeCentre::with('tournees')->get();
        $optionNiveauCarburant = OptionNiveauCarburant::all();
        $optionBordereau = OptionBordereau::orderBy("numero")->get();
        $tourneeCentres = TourneeCentre::with('tournees')
            ->with('details')
            ->get();
        return view('/securite.maincourante.index',
            compact('centres', 'centres_regionaux',
                'tournees', 'departCentres', 'arriveeSites',
                'departSites', 'arriveeCentres', 'tourneeCentres', 'sitesDepartTournees', 'date', 'sites', 'sitesTournees', 'optionNiveauCarburant', 'optionBordereau'));
    }

    public function liste()
    {
        $tournees = DepartTournee::all();

        return view('/securite.maincourante.liste', compact('tournees'));
    }

    public function synthesesListe(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $tournee = $request->get('tournee');
        $vehicule = $request->get('vehicule');

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $toutesTournees = DepartTournee::all();
        $vehicules = Vehicule::all();

        $tournees = DepartTournee::with('departCentre')
            ->with('arriveeCentre')
            ->get();
        if (isset($debut) && isset($fin)) {
            $tournees = DepartTournee::with('departCentre')
                ->with('arriveeCentre')
                ->whereBetween('date', [$debut, $fin])
                ->get();
        }
        if (isset($vehicule)) {
            $tournees = DepartTournee::with('departCentre')
                ->with('arriveeCentre')
                ->where('idVehicule', $vehicule)
                ->get();
        }
        if (isset($tournee)) {
            $tournees = DepartTournee::with('departCentre')
                ->with('arriveeCentre')
                ->where('id', $tournee)
                ->get();
        }
        if (isset($centre) && isset($centre_regional)) {
            $tournees = DepartTournee::with('departCentre')
                ->with('arriveeCentre')
                ->where('centre', $centre)
                ->where('centre_regional', $centre_regional)
                ->get();
        }
        if (isset($centre_regional)) {
            $tournees = DepartTournee::with('departCentre')
                ->with('arriveeCentre')
                ->where('centre_regional', $centre_regional)
                ->get();
        }
        if (isset($centre)) {
            $tournees = DepartTournee::with('departCentre')
                ->with('arriveeCentre')
                ->where('centre', $centre)
                ->get();
        }

        return view('/securite.maincourante.synthese', compact('tournees', 'debut', 'fin', 'tournee', 'tournees',
            'centres', 'centres_regionaux', 'centre', 'centre_regional', 'vehicules', 'vehicule', 'toutesTournees'));
    }

    public function arriveeSiteListe(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");

        $arriveeSites = ArriveeSite::all();
        if (isset($debut) && isset($fin)) {
            $arriveeSites = ArriveeSite::with("tournees")
                ->whereBetween('dateArrivee', [$debut, $fin])->get();
        }

        return view('/securite.maincourante.arrivee-site.liste',
            compact('arriveeSites', 'centres', 'centres_regionaux', 'centre', 'centre_regional'));
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
            //'date' => $request->get('date'),
            'noTournee' => $request->get('tournee'),
            'heureDepart' => $request->get('dcHeureDepart'),
            'kmDepart' => $request->get('dcKmDepart'),
            'observation' => $request->get('dcObservation'),
            'niveauCarburant' => $request->get('dcNiveauCarburant'),
        ]);
        $departCentre->save();

        return redirect('/maincourante-departcentreliste')->with('success', 'Enregistrement effectué!');
    }

    public function storeArriveeSite(Request $request)
    {
        $arrivee = new ArriveeSite([
            'noTournee' => $request->get('tournee'),
            'site' => $request->get('asSite'),
            'operation' => $request->get('asTypeOperation'),
            'dateArrivee' => $request->get('asDateArrivee'),
            'heureArrivee' => $request->get('asHeureArrivee'),
            'debutOperation' => $request->get('asDebutOperation'),
            'finOperation' => $request->get('asFinOperation'),
            'tempsOperation' => $request->get('asTempsOperation'),
            'nombre_colis' => $request->get('asNbColis'),
            'asObservation' => $request->get('asObservation'),
            'asDestination' => $request->get('asDestination'),
            'asDepartSite' => $request->get('asDepartSite'),
            'asKm' => $request->get('asKm'),
            'bordereau' => $request->get('asNumBordereau'),
            'num_colis' => $request->get('asNumColis'),
        ]);
        $arrivee->save();

        $asColis = $request->get('asColis');
        $asNbColis = $request->get('asNbColis');
        $asNumColis = $request->get('asNumColis');
        $asNumBordereau = $request->get('asNumBordereau');
        $asMontantAnnonce = $request->get('asMontantAnnonce');
        $asNatureColis = $request->get('asNatureColis');
        $asNombreColis = $request->get('asNombreColis');

        for ($i = 0; $i < count($asColis); $i++) {
            if (!empty($asColis[$i])) {
                $as = new ArriveeSiteColis([
                    'arrivee_site' => $arrivee->id,
                    'site' => $asNbColis[$i] ?? null,
                    'colis' => $asColis[$i] ?? null,
                    'num_colis' => $asNumColis[$i] ?? 0,
                    'bordereau' => $asNumBordereau[$i] ?? null,
                    'montant' => $asMontantAnnonce[$i] ?? null,
                    'nature' => $asNatureColis[$i] ?? null,
                    'nombre_colis' => $asNombreColis[$i] ?? null,
                ]);
                $as->save();
            }
        }
        return redirect('/maincourante-arriveesiteliste')->with('success', 'Enregistrement effectué!');
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
            'noTournee' => $request->get('tournee'),
            'heureArrivee' => $request->get('heureArrivee'),
            'kmArrive' => $request->get('kmArrive'),
            'observation' => $request->get('observation'),
            'niveauCarburant' => $request->get('niveauCarburant'),
            'finTournee' => $request->get('finTournee'),
            'dateArrivee' => $request->get('dateArrivee'),
        ]);
        $arriveeCentre->save();
        return redirect('/maincourante-arriveecentreliste')->with('success', 'Enregistrement effectué!');
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

    public function editDepartCentre(Request $request, $id)
    {
        $centre = DepartCentre::all()->find($id);
        $optionNiveauCarburant = OptionNiveauCarburant::all();
        return view('securite.maincourante.depart-centres.edit', compact('centre', 'optionNiveauCarburant'));
    }

    public function editArriveeSite(Request $request, $id)
    {
        $site = ArriveeSite::with('sites')->with('ArriveeColis')->find($id);
        $arriveeColis = ArriveeSiteColis::all()->where('arrivee_site', '=', $id);
        $sites = Commercial_site::all();
        $optionBordereau = OptionBordereau::all();
        return view('securite.maincourante.arrivee-site.edit', compact('site', 'sites', 'arriveeColis', 'optionBordereau'));
    }

    public function editDepartSite(Request $request, $id)
    {
        $site = DepartSite::with('tournees')->find($id);
        return view('securite.maincourante.depart-site.edit', compact('site'));
    }

    public function editArriveeCentre(Request $request, $id)
    {
        $centre = ArriveeCentre::all()->find($id);
        return view('securite.maincourante.arrivee-centre.edit', compact('centre'));
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
        $arrivee->asObservation = $request->get('asObservation');
        $arrivee->asDestination = $request->get('asDestination');
        $arrivee->asDepartSite = $request->get('asDepartSite');
        $arrivee->asKm = $request->get('asKm');
        $arrivee->save();

        $asColis_edit = $request->get('asColis_edit');
        $asNumColis_edit = $request->get('asNumColis_edit');
        $asNumBordereau_edit = $request->get('asNumBordereau_edit');
        $asMontantAnnonce_edit = $request->get('asMontantAnnonce_edit');
        $asNatureColis_edit = $request->get('asNatureColis_edit');
        $asNombreColis_edit = $request->get('asNombreColis_edit');
        $ids = $request->get('colis_id');

        if ($request->get('asNumColis_edit')) {
            for ($i = 0; $i < count($asNumColis_edit); $i++) {
                if (!empty($asNumColis_edit[$i])) {
                    $as = ArriveeSiteColis::find($ids[$i]);
                    $as->arrivee_site = $id;
                    $as->colis = $asColis_edit[$i];
                    $as->num_colis = $asNumColis_edit[$i];
                    $as->bordereau = $asNumBordereau_edit[$i];
                    //$as->montant = $asMontantAnnonce_edit[$i];
                    //$as->nature = $asNatureColis_edit[$i];
                    $as->nombre_colis = $asNombreColis_edit[$i];
                    $as->save();
                }
            }
        }

        $asColis = $request->get('colis');
        $asNumColis = $request->get('num_colis');
        $asNumBordereau = $request->get('bordereau');
        $asMontantAnnonce = $request->get('montant');
        $asNatureColis = $request->get('nature');
        $asNombreColis = $request->get('nombre_colis');

        if (isset($asNumColis)) {

            for ($i = 0; $i < count($asNumColis); $i++) {
                if (!empty($asNumColis[$i])) {
                    $as = new ArriveeSiteColis([
                        'arrivee_site' => $id,
                        'colis' => $asColis[$i],
                        'num_colis' => $asNumColis[$i],
                        'bordereau' => $asNumBordereau[$i],
                        'montant' => $asMontantAnnonce[$i],
                        'nature' => $asNatureColis[$i],
                        'nombre_colis' => $asNombreColis[$i],
                    ]);
                    $as->save();
                }
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

    public function updateArriveeCentre(Request $request, $id)
    {
        $centre = ArriveeCentre::find($id);
        $centre->heureArrivee = $request->get('heureArrivee');
        $centre->kmArrive = $request->get('kmArrive');
        $centre->observation = $request->get('observation');
        $centre->niveauCarburant = $request->get('niveauCarburant');
        $centre->finTournee = $request->get('finTournee');
        $centre->dateArrivee = $request->get('dateArrivee');
        $centre->save();
        return redirect()->back()->with('success', 'Mise à jour réussie');
    }

    public function updatedepartCentre(Request $request, $id)
    {
        $departCentre = DepartCentre::find($id);
        $departCentre->heureDepart = $request->get('heureDepart');
        $departCentre->kmDepart = $request->get('kmDepart');
        $departCentre->observation = $request->get('observation');
        $departCentre->niveauCarburant = $request->get('niveauCarburant');

        $departCentre->save();
        return redirect()->back()->with('success', 'Mise à jour réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = DepartTournee::find($id);
            $data->delete();
            return \response()->json([
                'message' => 'supprimé'
            ]);
        }
        $data = DepartTournee::find($id);
        $data->delete();
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

    public function deleteArriveeSiteItem(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = ArriveeSiteColis::find($id);
            $data->delete();
            return \response()->json([
                'message' => 'supprimé'
            ]);
        }
    }

    public function deleteArriveeCentre(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = ArriveeCentre::find($id);
            $data->delete();
            return \response()->json([
                'message' => 'supprimé'
            ]);
        }
    }
}
