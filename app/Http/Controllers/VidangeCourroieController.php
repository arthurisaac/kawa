<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeCourroie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VidangeCourroieController extends Controller
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
        $vidanges = VidangeCourroie::all();
        return view('/transport/entretien-vehicule/vidange-courroie.index',
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
        $vidange = new VidangeCourroie([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule_courroie'),
            'kmActuel' => $request->get('kmActuel'),
            'prochainKm' => $request->get('prochainKm'),
            'courroie' => $request->get('courroie'),
            'courroieMarque' => $request->get('courroieMarque'),
            'courroieKm' => $request->get('courroieKm'),
            'courroieFournisseur' => $request->get('courroieFournisseur'),
            'courroieMontant' => $request->get('courroieMontant'),
        ]);
        $vidange->save();
        //return redirect('/vidange-courroie')->with('success', 'Courroie enregistré!');
        return redirect('/vidange-courroie')->with('success', 'Courroie enregistré!');
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
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $data = VidangeCourroie::find($id);
        if ($data) {
            $data->delete();
        }
        return \response()->json([
            "message" => "good"
        ]);
    }
}
