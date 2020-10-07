<?php

namespace App\Http\Controllers;

use App\Models\CarburantCarte;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarburantCarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('/logistique/carburant/carte-carburant.index',
            compact('vehicules'));
    }

    public function liste()
    {
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carte-carburant.liste',
            compact('cartes'));
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
        $carte = new CarburantCarte([
            'numeroCarte' => $request->get('numeroCarte'),
            'societe' => $request->get('societe'),
            'idVehicule' => $request->get('idVehicule'),
            'dateAquisition' => $request->get('dateAquisition'),
        ]);
        $carte->save();
        return redirect('/carte-carburant')->with('success', 'Carte carburant enregistrée!');
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
        $carte = CarburantCarte::find($id);
        $vehicules = Vehicule::all();
        return view('/logistique/carburant/carte-carburant.edit',
            compact('vehicules','carte'));
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
        $carte = CarburantCarte::find($id);
        $carte->numeroCarte = $request->get('numeroCarte');
        $carte->societe = $request->get('societe');
        $carte->idVehicule = $request->get('idVehicule');
        $carte->dateAquisition = $request->get('dateAquisition');
        $carte->save();
        return redirect('/carte-carburant-liste')->with('success', 'Carte carburant enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $carte = CarburantCarte::find($id);
        $carte->delete();
        return redirect('/carte-carburant-liste')->with('success', 'Carte carburant supprimée!');
    }
}
