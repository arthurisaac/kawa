<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use App\Vehicule;
use App\VidangeHuilePont;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VidangePontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $vidanges = VidangeHuilePont::all();
        return view('/transport/entretien-vehicule/vidange-pont.index',
            compact('vehicules', 'centres', 'centres_regionaux', 'vidanges'));
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
        $vidanges = new VidangeHuilePont([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'kmActuel' => $request->get('kmActuel'),
            'prochainKm' => $request->get('prochainKm'),
            'huilePont' => $request->get('huilePont'),
            'huilePontMarque' => $request->get('huilePontMarque'),
            'huilePontKm' => $request->get('huilePontKm'),
            'huilePontFournisseur' => $request->get('huilePontFournisseur'),
            'huilePontmontant' => $request->get('huilePontmontant'),
        ]);
        $vidanges->save();
        return redirect('/vidange-pont')->with('success', 'Vidange pont enregistrée!');
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
