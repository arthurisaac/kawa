<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EtatBordereauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/transport/etat-bordereau.index');
    }

    public function tourneeSurPeriode()
    {
        return view('/transport/etat-bordereau.tournee-sur-periode');
    }

    public function surPeriode()
    {
        return view('/transport/etat-bordereau.sur-periode');
    }

    public function rentabiliteTournee()
    {
        return view('/transport/etat-bordereau.rentabilite-tournee');
    }

    public function parSite()
    {
        return view('/transport/etat-bordereau.par-site');
    }

    public function parClient()
    {
        return view('/transport/etat-bordereau.par-client');
    }

    public function parVehicule()
    {
        return view('/transport/etat-bordereau.par-vehicule');
    }

    public function parConvoyeur()
    {
        return view('/transport/etat-bordereau.par-convoyeur');
    }

    public function fondTransport()
    {
        return view('/transport/etat-bordereau.fond-transport-periode');
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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
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
