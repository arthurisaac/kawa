<?php

namespace App\Http\Controllers;

use App\Models\Commercial_site;
use App\Models\DepartSiteColis;
use App\Models\DepartTournee;
use App\Models\SiteDepartTournee;
use App\Models\Vehicule;
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
        $departTournee = DepartTournee::all();
        $vehicules = Vehicule::with('chauffeurSuppleants')->with('chauffeurTitulaires')->get();
        $sites = Commercial_site::all();
        $agents = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        $chefBords = DB::table('personnels')->where('transport', '=', 'Chef de bord')->get();
        $num = date('dmY') . (DB::table('depart_tournees')->max('id') + 1);
        // $chauffeurs = DB::table('personnels')->where('transport', '=', 'Chauffeur')->get();
        return view('transport.depart-tournee.index',
            compact('departTournee', 'vehicules', 'sites', 'agents', 'chefBords', 'num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }


    public function liste()
    {
        $departTournee = DepartTournee::with('vehicules')->get();
        return view('transport.depart-tournee.liste',
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
        ]);
        $departTournee->save();

        $sites = $request->get('site');
        $heures = $request->get('heure');
        $types = $request->get('type');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $siteDepartTournee = new SiteDepartTournee([
                    'idTourneeDepart' => $departTournee->id,
                    'site' => $sites[$i],
                    'heure' => $heures[$i],
                    'type' => $types[$i],
                ]);
                $siteDepartTournee->save();
            }
        }


        return redirect('/depart-tournee')->with('success', 'Tournée enregistrée!');
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
        $commercial_sites = Commercial_site::all();
        $tournee = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->find($id);
        $vehicules = Vehicule::with('chauffeurSuppleants')->with('chauffeurTitulaires')->get();
        $sites = SiteDepartTournee::with('sites')->get()->where('idTourneeDepart', '=', $id);
        $agents = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        $chefBords = DB::table('personnels')->where('transport', '=', 'Chef de bord')->get();
        $num = date('dmY') . (DB::table('depart_tournees')->max('id') + 1);
        return view('transport.depart-tournee.edit',
            compact('tournee', 'vehicules', 'sites', 'commercial_sites', 'agents', 'chefBords', 'num'));
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
        $departTournee->save();

        $sites = $request->get('site');
        $heures = $request->get('heure');
        $types = $request->get('type');
        $site_ids = $request->get('site_id');

        for ($i = 0; $i < count($sites); $i++) {
            if (!empty($sites[$i])) {
                $siteDepartTournee = SiteDepartTournee::find($site_ids[$i]);
                $siteDepartTournee->site = $sites[$i];
                $siteDepartTournee->heure = $heures[$i];
                $siteDepartTournee->type = $types[$i];
                $siteDepartTournee->save();
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
        $departTournee->delete();
        return redirect('/depart-tournee-liste')->with('success', 'Tournée supprimée!');
    }
}
