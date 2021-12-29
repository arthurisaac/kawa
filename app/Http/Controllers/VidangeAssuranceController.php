<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeAssurance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class VidangeAssuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidanges = VidangeAssurance::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/transport/entretien-vehicule/vidange-assurance.index',
            compact('vehicules', 'centres', 'centres_regionaux', 'vidanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
        $vignette = new VidangeAssurance([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule_assurance'),
            'dateRenouvellement' => $request->get('dateRenouvellement'),
            'prochainRenouvellement' => $request->get('prochainRenouvellement'),
            'montant' => $request->get('montant'),
        ]);
        $vignette->save();
        return redirect()->back()->with('success', 'Assurance enregistrée!');
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
        $vidange = VidangeAssurance::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('transport.entretien-vehicule.vidange-assurance.edit', compact('vidange'));
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
        $vignette = VidangeAssurance::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $vignette->dateRenouvellement = $request->get('dateRenouvellement');
        $vignette->prochainRenouvellement = $request->get('prochainRenouvellement');
        $vignette->montant = $request->get('montant');

        $vignette->save();
        //return redirect()->back()->with('success', 'Assurance enregistrée!');
        return redirect("/entretien-vehicule")->with('success', 'Assurance enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = VidangeAssurance::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) {
            $data->delete();
        }
        return \response()->json([
            "message" => "good"
        ]);
    }
}
