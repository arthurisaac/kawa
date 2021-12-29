<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeVignette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VidangeVignetteController extends Controller
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
        $vidanges = VidangeVignette::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/transport/entretien-vehicule/vidange-vignette.index',
            compact('vehicules', 'centres', 'centres_regionaux', 'vidanges'));
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
        $vignette = new VidangeVignette([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule_vignette'),
            'dateRenouvellement' => $request->get('dateRenouvellement'),
            'prochainRenouvellement' => $request->get('prochainRenouvellement'),
            'montant' => $request->get('montant'),
        ]);
        $vignette->save();
        //return redirect('/vidange-vignette')->with('success', 'Vignette enregistrée!');
        return redirect()->back()->with('success', 'Vignette enregistrée!');
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
        $vidange = VidangeVignette::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('transport.entretien-vehicule.vidange-vignette.edit', compact('vidange'));
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
        $vignette = VidangeVignette::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $vignette->dateRenouvellement = $request->get('dateRenouvellement');
        $vignette->prochainRenouvellement = $request->get('prochainRenouvellement');
        $vignette->montant = $request->get('montant');

        $vignette->save();
        return redirect("/entretien-vehicule")->with('success', 'Vignette enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = VidangeVignette::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) {
            $data->delete();
        }
        return \response()->json([
            "message" => "good"
        ]);
    }
}
