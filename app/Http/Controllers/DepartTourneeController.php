<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
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
        $sites = Commercial_site::all();
        $agents = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $chefBords = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $chauffeurs = DB::table('personnels')->where('fonction', 'like', '%convoyeur%')->get();
        $num = date('dmY') . (DB::table('depart_tournees')->max('id') + 1);
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
        $q = $request->get("q");
        $client = $request->get("client");
        $site = $request->get("site");

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

        return view('transport.depart-tournee.liste-ca', compact('sites', 'totalTournee'));
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
        $agents = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        $chefBords = DB::table('personnels')->where('transport', '=', 'Chef de bord')->get();
        $chauffeurs = DB::table('personnels')->where('transport', 'like', 'chauffeur')->get();
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
