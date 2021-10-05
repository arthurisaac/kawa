<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeTransport;
use Illuminate\Http\Request;

class VidangeTransportController extends Controller
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
        $vidanges = VidangeTransport::all();
        return view('/transport/entretien-vehicule/vidange-transport.index',
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
        $transport = new VidangeTransport([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule_transport'),
            'dateRenouvellement' => $request->get('dateRenouvellement'),
            'prochainRenouvellement' => $request->get('prochainRenouvellement'),
            'montant' => $request->get('montant'),
        ]);
        $transport->save();
        //return redirect('/vidange-transport')->with('success', 'Carte de transport enregistrée!');
        return redirect("entretien-vehicule")->with('success', 'Carte de transport enregistrée!');
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
        $vidange = VidangeTransport::find($id);
        return view('transport.entretien-vehicule.vidange-transport.edit', compact('vidange'));
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
        $vignette = VidangeTransport::find($id);
        $vignette->dateRenouvellement = $request->get('dateRenouvellement');
        $vignette->prochainRenouvellement = $request->get('prochainRenouvellement');
        $vignette->montant = $request->get('montant');

        $vignette->save();
        return redirect()->back()->with('success', 'Enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = VidangeTransport::find($id);
        if ($data) {
            $data->delete();
        }
        return \response()->json([
            "message" => "good"
        ]);
    }
}
