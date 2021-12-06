<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\DepartTournee;
use App\Models\SiteDepartTournee;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DepartTourneeController extends Controller
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
        $departTournee = DepartTournee::all();
        $vehicules = Vehicule::with('chauffeurSuppleants')->with('chauffeurTitulaires')->get();
        $sites = Commercial_site::orderBy('site')->get();
        $agents = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->orderBy('nomPrenoms')->get();
        $chefBords = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->orderBy('nomPrenoms')->get();
        $chauffeurs = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->orderBy('nomPrenoms')->get();
        $num = (DB::table('depart_tournees')->max('id') + 1);
        return view('transport.depart-tournee.index',
            compact('departTournee', 'vehicules', 'chauffeurs', 'sites', 'agents', 'chefBords', 'num', 'centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }


    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");

        $departTournee = DepartTournee::with('vehicules')
            ->orderByDesc("created_at")
            ->get();
        if (isset($debut) && isset($fin)) {
            $departTournee = DepartTournee::with('vehicules')
                ->whereBetween('date', [$debut, $fin])
                ->orderByDesc("created_at")
                ->get();
        }
        return view('transport.depart-tournee.liste',
            compact('departTournee'));
    }

    public function listeDesservi(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $q = $request->get("q");

        $totalTournee = DepartTournee::all()->sum('coutTournee');
        $tournees = DepartTournee::all();
        $siteDepartTournee = SiteDepartTournee::with('sites')
            ->orderByDesc("created_at")
            ->get();
        if (isset($debut) && isset($fin)) {
            $siteDepartTournee = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->get();
            $tournees = DepartTournee::with('tournees')->whereBetween('date', [$debut, $fin]);
        }
        if (isset($q)) {
            $siteDepartTournee = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($q) {
                $query->where('numeroTournee', 'like', '%' . $q . '%');
                $query->where('date', 'like', '%' . $q . '%');
                $query->where('centre', 'like', '%' . $q . '%');
                $query->where('centre_regional', 'like', '%' . $q . '%');
                $query->where('heureDepart', 'like', '%' . $q . '%');
                $query->where('kmDepart', 'like', '%' . $q . '%');
            })->get();
            $tournees = DepartTournee::where('numeroTournee', 'like', '%' . $q . '%')
                ->where('date', 'like', '%' . $q . '%')
                ->orWhere('coutTournee', 'like', '%' . $q . '%')
                ->orWhere('kmDepart', 'like', '%' . $q . '%')
                ->orWhere('heureDepart', 'like', '%' . $q . '%')
                ->orWhere('centre', 'like', '%' . $q . '%')
                ->orWhere('centre_regional', 'like', '%' . $q . '%')
                ->get();
        }
        return view('transport.desservi.liste', compact('siteDepartTournee', 'totalTournee', 'tournees'));
    }

    public function listeCA(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $client = $request->get("client");
        $site = $request->get("site");
        $tdf = $request->get("tdf");

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients = Commercial_client::orderBy('client_nom')->get();
        $sites_com = Commercial_site::orderBy('site')->get();

        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");

        $siteParTournees = array();
        $totalTournee = DepartTournee::all()->sum('coutTournee');
        $sites = SiteDepartTournee::with('sites')
            ->orderByDesc("created_at")
            ->get();
        if (isset($debut) && isset($fin)) {
            $sites = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($fin, $debut) {
                $query->whereBetween('date', [$debut, $fin]);
            })->get();
            $totalTournee = DepartTournee::with('tournees')->whereBetween('date', [$debut, $fin])->sum('coutTournee');
        }
        if (isset($centre_regional)) {
            $sites = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($centre_regional) {
                $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
            })->get();
            $totalTournee = DepartTournee::with('tournees')->where('centre_regional', 'like', '%' . $centre_regional . '%')->sum('coutTournee');
        }
        if (isset($centre)) {
            $sites = SiteDepartTournee::whereHas('tournees', function (Builder $query) use ($centre) {
                $query->where('centre', 'like', '%' . $centre . '%');
            })->get();
            $totalTournee = DepartTournee::with('tournees')->where('centre', 'like', '%' . $centre . '%')->sum('coutTournee');
        }
        if (isset($client)) {
            $sites = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($client) {
                $query->where('client', 'like', '%' . $client . '%');
            })->get();
            $totalTournee = 0;
            $siteParTournees = DepartTournee::with('sites')
                ->join('site_depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->join('commercial_sites', 'site_depart_tournees.site', '=', 'commercial_sites.id')
                ->where('commercial_sites.client', '=', $client)
                ->groupBy('depart_tournees.id')
                ->get(['coutTournee']);

            foreach ($siteParTournees as $tournee) {
                $totalTournee += $tournee["coutTournee"] ?? 0;
            }

        }
        if (isset($site)) {
            $sites = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($site) {
                $query->where('id', 'like', '%' . $site . '%');
            })->get();
            $totalTournee = 0;
            $siteParTournees = DepartTournee::with('sites')
                ->join('site_depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->join('commercial_sites', 'site_depart_tournees.site', '=', 'commercial_sites.id')
                ->where('commercial_sites.id', '=', $site)
                ->groupBy('depart_tournees.id')
                ->get(['coutTournee']);

            foreach ($siteParTournees as $tournee) {
                $totalTournee += $tournee["coutTournee"] ?? 0;
            }

        }
        if (isset($tdf)) {
            $sites = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($tdf) {
                $query->where('tdf', 'like', '%' . $tdf . '%');
            })->get();
            $totalTournee = 0;
            $siteParTournees = DepartTournee::with('sites')
                ->join('site_depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->join('commercial_sites', 'site_depart_tournees.site', '=', 'commercial_sites.id')
                ->where('site_depart_tournees.tdf', '=', $tdf)
                ->groupBy('depart_tournees.id')
                ->get(['coutTournee']);

            foreach ($siteParTournees as $tournee) {
                $totalTournee += $tournee["coutTournee"] ?? 0;
            }

        }

        if (isset($debut) && isset($fin) && isset($site) && isset($centre) && isset($centre_regional)) {
            /*$sites = SiteDepartTournee::whereHas('sites', function (Builder $query) use ($site, $fin, $debut, $centre_regional, $centre) {
                $query->whereBetween('date', [$debut, $fin]);
                $query->where('id', 'like', '%' . $site . '%');
                $query->where('centre_regional', 'like', '%' . $centre_regional . '%');
                $query->where('centre', 'like', '%' . $centre . '%');
            })->get();*/
            $sites = SiteDepartTournee::with('tournees')
                ->join('depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('site_depart_tournees.site', 'like', '%' . $site . '%')
                ->where('depart_tournees.centre_regional', 'like', '%' . $centre_regional . '%')
                ->where('depart_tournees.centre', 'like', '%' . $centre . '%')
                ->get();
            $totalTournee = 0;
            $siteParTournees = DepartTournee::with('sites')
                ->whereBetween('depart_tournees.date', [$debut, $fin])
                ->where('depart_tournees.centre', 'like', '%' . $centre . '%')
                ->where('depart_tournees.centre_regional', 'like', '%' . $centre_regional . '%')
                ->join('site_depart_tournees', 'site_depart_tournees.idTourneeDepart', '=', 'depart_tournees.id')
                ->join('commercial_sites', 'site_depart_tournees.site', '=', 'commercial_sites.id')
                ->where('commercial_sites.id', '=', $site)
                ->groupBy('depart_tournees.id')
                ->get(['coutTournee']);

            foreach ($siteParTournees as $tournee) {
                $totalTournee += $tournee["coutTournee"] ?? 0;
            }
        }

        return view('transport.depart-tournee.liste-ca', compact('sites', 'siteParTournees', 'totalTournee', 'centres', 'centres_regionaux', 'clients', 'sites_com',
        'site', 'client', 'debut', 'fin', 'centre', 'centre_regional'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // $numeroTournee = $request->get('numeroTournee');
        $departTournee = new DepartTournee([
            'coutTournee' => $request->get('coutTournee'),
            'numeroTournee' => $request->get('numeroTournee'),
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule'),
            'chauffeur' => $request->get('chauffeur'),
            'agentDeGarde' => $request->get('agentDeGarde'),
            'chefDeBord' => $request->get('chefDeBord'),
            'kmDepart' => $request->get('kmDepart'),
            'heureDepart' => $request->get('heureDepart'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional')
        ]);
        $departTournee->save();

        $sites = $request->get('site');
        $types = $request->get('type');
        $tdf = $request->get('tdf');
        $caisse = $request->get('caisse');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $siteDepartTournee = new SiteDepartTournee([
                    'idTourneeDepart' => $departTournee->id,
                    'site' => $sites[$i] ?? '1',
                    'type' => $types[$i] ?? '',
                    'tdf' => $tdf[$i] ?? '',
                    'caisse' => $caisse[$i] ?? '',
                ]);
                $siteDepartTournee->save();
            }
        }


        return redirect('/depart-tournee-liste')->with('success', 'Tournée enregistrée!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        // $commercial_sites = Commercial_site::all();
        $tournee = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->find($id);
        // $vehicules = Vehicule::with('chauffeurSuppleants')->with('chauffeurTitulaires')->get();
        $sites = SiteDepartTournee::with('sites')->get()->where('idTourneeDepart', '=', $id);
        //$agents = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        // $chefBords = DB::table('personnels')->where('transport', '=', 'Chef de bord')->get();
        // $num = date('dmY') . (DB::table('depart_tournees')->max('id') + 1);
        return view('transport.depart-tournee.show',
            compact('tournee',  'sites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $commercial_sites = Commercial_site::all();
        $tournee = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->find($id);
        $vehicules = Vehicule::with('chauffeurSuppleants')->with('chauffeurTitulaires')->get();
        $sitesTournees = SiteDepartTournee::with('sites')->get()->where('idTourneeDepart', '=', $id);
        $agents = DB::table('personnels')->where('service', '=', 'transport')->get();
        $chefBords = DB::table('personnels')->where('service', '=', 'transport')->get();
        $chauffeurs = DB::table('personnels')->where('service', '=', 'transport')->get();
        $num = date('dmY') . (DB::table('depart_tournees')->max('id') + 1);
        return view('transport.depart-tournee.edit',
            compact('tournee', 'vehicules', 'sitesTournees', 'commercial_sites', 'agents', 'chefBords', 'num', 'chauffeurs', 'centres', 'centres_regionaux'));
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
        $departTournee = DepartTournee::find($id);
        $departTournee->coutTournee = $request->get('coutTournee');
        $departTournee->numeroTournee = $request->get('numeroTournee');
        $departTournee->date = $request->get('date');
        $departTournee->idVehicule = $request->get('idVehicule');
        $departTournee->chauffeur = $request->get('chauffeur');
        $departTournee->agentDeGarde = $request->get('agentDeGarde');
        $departTournee->chefDeBord = $request->get('chefDeBord');
        $departTournee->kmDepart = $request->get('kmDepart');
        $departTournee->centre = $request->get('centre');
        $departTournee->centre_regional = $request->get('centre_regional');
        $departTournee->save();

        /*$sites_edit = $request->get('site_edit');
        $types_edit = $request->get('type_edit');
        $tdf_edit = $request->get('tdf_edit');
        $caisse_edit = $request->get('caisse_edit');
        $site_ids = $request->get('site_id');

        for ($i = 0; $i < count($site_ids); $i++) {
            if (!empty($sites_edit[$i]) && !empty($tdf_edit[$i])) {
                $siteDepartTournee = SiteDepartTournee::find($site_ids[$i]);
                $siteDepartTournee->site = $sites_edit[$i] ?? '1';
                $siteDepartTournee->type = $types_edit[$i] ?? '';
                $siteDepartTournee->tdf = $tdf_edit[$i] ?? '';
                $siteDepartTournee->caisse = $caisse_edit[$i] ?? '';
                $siteDepartTournee->save();
            }
        }*/

        if ($request->get('site')) {
            $sites = $request->get('site');
            $types = $request->get('type');
            $tdf = $request->get('tdf');
            $caisse = $request->get('caisse');
            $site_ids = $request->get('site_id');
            for ($i = 0; $i < count($site_ids); $i++) {
                if (empty($site_ids[$i])) {
                    if (isset($sites[$i])) {
                        $siteDepartTournee = new SiteDepartTournee([
                            'idTourneeDepart' => $departTournee->id,
                            'site' => $sites[$i],
                            'type' => $types[$i] ?? '',
                            'tdf' => $tdf[$i] ?? '',
                            'caisse' => $caisse[$i] ?? '',
                        ]);
                        $siteDepartTournee->save();
                    }

                } else {
                    $siteDepartTournee = SiteDepartTournee::find($site_ids[$i]);
                    if ($siteDepartTournee) {
                        $siteDepartTournee->site = $sites[$i] ?? '1';
                        $siteDepartTournee->type = $types[$i] ?? '';
                        $siteDepartTournee->tdf = $tdf[$i] ?? '';
                        $siteDepartTournee->caisse = $caisse[$i] ?? '';
                        $siteDepartTournee->save();
                    }
                }
            }
        }

        return redirect('/depart-tournee-liste')->with('success', 'Tournée modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $departTournee = DepartTournee::find($id);
        $sitesDepart = SiteDepartTournee::all()->where("idTourneeDepart", "=", $id);
        foreach ($sitesDepart as $site)
            $site->delete();

        $departTournee->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
        //return redirect('/depart-tournee-liste')->with('success', 'Tournée supprimée!');
    }

    public function destroyItem($id)
    {
        $sitesDepart = SiteDepartTournee::find($id);
        if ($sitesDepart) $sitesDepart->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
    }
}
