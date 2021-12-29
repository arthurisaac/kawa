<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeAssurance;
use App\Models\VidangeCourroie;
use App\Models\VidangeGenerale;
use App\Models\VidangeHuilePont;
use App\Models\VidangePatente;
use App\Models\VidangeTransport;
use App\Models\VidangeVignette;
use App\Models\VidangeVisite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntretienVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangePonts = VidangeHuilePont::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeTransport = VidangeTransport::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeVisite = VidangeVisite::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeCourroie = VidangeCourroie::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeVignette = VidangeVignette::where('localisation_id', Auth::user()->localisation_id)->get();
        $assurances = VidangeAssurance::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/transport/entretien-vehicule.index',
            compact('vehicules', 'centres_regionaux', 'centres', 'vidangePonts', 'vidangeTransport', 'vidangeVisite', 'vidangeCourroie', 'vidangeVignette', 'assurances'));
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


    public function liste()
    {
        $vidangeGenerale = VidangeGenerale::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangePonts = VidangeHuilePont::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeTransport = VidangeTransport::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeVisite = VidangeVisite::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeCourroie = VidangeCourroie::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangeVignette = VidangeVignette::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidangePatentes = VidangePatente::where('localisation_id', Auth::user()->localisation_id)->get();
        $assurances = VidangeAssurance::where('localisation_id', Auth::user()->localisation_id)->get();
        return view("transport.entretien-vehicule.liste", compact("vidangePonts", "vidangeGenerale", "vidangeTransport", "vidangeVisite", "vidangeCourroie", "vidangeVignette", "vidangePatentes", "assurances"));
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = VidangeCourroie::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) {
            $data->delete();
        }
        return \response()->json([
            "message" => "good"
        ]);
    }
}
