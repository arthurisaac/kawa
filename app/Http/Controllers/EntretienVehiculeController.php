<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeCourroie;
use App\Models\VidangeHuilePont;
use App\Models\VidangeTransport;
use App\Models\VidangeVignette;
use App\Models\VidangeVisite;
use Illuminate\Http\Request;

class EntretienVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $vidangePonts = VidangeHuilePont::all();
        $vidangeTransport = VidangeTransport::all();
        $vidangeVisite = VidangeVisite::all();
        $vidangeCourroie = VidangeCourroie::all();
        $vidangeVignette = VidangeVignette::all();
        return view('/transport/entretien-vehicule.index',
            compact('vehicules', 'centres_regionaux', 'centres', 'vidangePonts', 'vidangeTransport', 'vidangeVisite', 'vidangeCourroie', 'vidangeVignette'));
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
        //
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
