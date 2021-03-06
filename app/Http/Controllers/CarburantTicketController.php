<?php

namespace App\Http\Controllers;

use App\Models\CarburantCarte;
use App\Models\CarburantTicket;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarburantTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        $cartes = CarburantCarte::all();
        return view('/transport/ticket-carburant.index',
            compact('vehicules','cartes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $carburants = CarburantTicket::all();
        return view('/transport/ticket-carburant.liste',
            compact('carburants'));
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
        $carburant = new CarburantTicket([
            'date' => $request->get('date'),
            'heure' => $request->get('heure'),
            'lieu' => $request->get('lieu'),
            'numeroTicket' => $request->get('numeroTicket'),
            'numeroCarteCarburant' => $request->get('numeroCarteCarburant'),
            'idVehicule' => $request->get('idVehicule'),
            'solde' => $request->get('solde'),
            'soldePrecedent' => $request->get('soldePrecedent'),
            'utilisation' => $request->get('utilisation'),
            'kilometrage' => $request->get('kilometrage'),
            'litrage' => $request->get('litrage'),
        ]);
        $carburant->save();
        return redirect('/ticket-carburant')->with('success', 'Ticket carburant enregistré!');
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
