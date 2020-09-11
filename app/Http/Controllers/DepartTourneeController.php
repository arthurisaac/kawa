<?php

namespace App\Http\Controllers;

use App\Commercial_site;
use App\SiteDepartTournee;
use App\Tournee;
use App\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DepartTournee;

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
        $vehicules = Vehicule::all();
        $sites = Commercial_site::all();
        return view('transport/depart-tournee.index',
            compact('departTournee', 'vehicules', 'sites'));
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
        $numeroTournee = $request->get('numeroTournee');
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
            $siteDepartTournee = new SiteDepartTournee([
                'idTourneeDepart' => $departTournee->id,
                'site' => $sites[$i],
                'heure' => $heures[$i],
                'type' => $types[$i],
            ]);
            $siteDepartTournee->save();
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
