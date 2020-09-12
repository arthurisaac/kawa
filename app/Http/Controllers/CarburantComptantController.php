<?php

namespace App\Http\Controllers;

use App\CarburantComptant;
use App\Vehicule;
use Illuminate\Http\Request;

class CarburantComptantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('/transport/carburant-comptant.index',
            compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carburant = new CarburantComptant([
            'idVehicule' => $request->get('idVehicule'),
            'date' => $request->get('date'),
            'montant' => $request->get('montant'),
            'qteServie' => $request->get('qteServie'),
            'lieu' => $request->get('lieu'),
            'utilisation' => $request->get('utilisation')
        ]);
        $carburant->save();
        return redirect('/carburant-comptant')->with('success', 'Carburant comptant enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
