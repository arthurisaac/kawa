<?php

namespace App\Http\Controllers;

use App\Models\Commercial_site;
use App\Models\SiteDepartTournee;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DepartTournee;
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
        $vehicules = Vehicule::with('chauffeurSuppleant')->with('chauffeurTitulaire')->get();
        $sites = Commercial_site::all();
        $agents = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        $chefBords = DB::table('personnels')->where('transport', '=', 'Chef de bord')->get();
        // $chauffeurs = DB::table('personnels')->where('transport', '=', 'Chauffeur')->get();
        return view('transport/depart-tournee.index',
            compact('departTournee', 'vehicules', 'sites', 'agents', 'chefBords'));
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
        // $numeroTournee = $request->get('numeroTournee');
        $departTournee = new DepartTournee([
            'coutTournee' => $request->get('coutTournee'),
            'numeroTournee' => $request->get('numeroTournee'),
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule'),
            'chauffeur' => $request->get('chauffeur'),
            'agentDeGarde' => $request->get('agentDeGarde'),
            'chefDeBord' => $request->get('chefDeBord')
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
