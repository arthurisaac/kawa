<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Personnel;
use App\Models\RegulationBordereau;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegulationBordereauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personnels = Personnel::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/regulation.bordereau.index', compact('centres', 'centres_regionaux', 'personnels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $bordereaux= RegulationBordereau::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/regulation.bordereau.liste',
            compact('bordereaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bordereau = new RegulationBordereau([
            'date' => $request->get('date'),
            'heure' => $request->get('date'),
            'stockInitial' => $request->get('date'),
            'numeroDebut' => $request->get('date'),
            'numeroFin' => $request->get('date'),
            'quantite' => $request->get('date'),
            'stockTotal' => $request->get('date'),
            'seuilAlerte1' => $request->get('date'),
            'seuilAlerte2' => $request->get('date'),
            'seuilAlerte3' => $request->get('date'),
            'dateAffection' => $request->get('date'),
            'centre' => $request->get('date'),
            'centreRegional' => $request->get('date'),
            'typeAffectation' => $request->get('date'),
            'responsable' => $request->get('date'),
            'numeroDebutAffection' => $request->get('date'),
            'numeroFinAffection' => $request->get('date'),
            'quantiteAffectee' => $request->get('date'),
            'stockActuel' => $request->get('date'),
        ]);
        $bordereau->save();
        return redirect('/regulation-vervice-liste');
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
