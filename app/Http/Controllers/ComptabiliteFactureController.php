<?php

namespace App\Http\Controllers;

use App\Models\Commercial_client;
use App\Models\ComptabiliteFacture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComptabiliteFactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        $nextId = DB::table('comptabilite_factures')->where('localisation_id', Auth::user()->localisation_id)->max('id') + 1;
        return view('/comptabilite/facture.index', compact('clients', 'nextId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $factures = ComptabiliteFacture::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/facture.liste', compact('factures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $facture = new ComptabiliteFacture([
            'numeroFacture' => $request->get('numeroFacture'),
            'client' => $request->get('client'),
            'periode' => $request->get('periode'),
            'montant' => $request->get('montant'),
            'dateDepot' => $request->get('dateDepot'),
            'dateEcheance' => $request->get('dateEcheance'),
        ]);
        $facture->save();
        return redirect('/comptabilite-fature')->with('success', 'Facture enregistrée!');
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
        $facture = ComptabiliteFacture::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/facture.edit', compact('clients', 'facture'));
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
        $facture = ComptabiliteFacture::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $facture->numeroFacture = $request->get('numeroFacture');
        $facture->client = $request->get('client');
        $facture->periode = $request->get('periode');
        $facture->montant = $request->get('montant');
        $facture->dateDepot = $request->get('dateDepot');
        $facture->dateEcheance = $request->get('dateEcheance');
        $facture->save();
        return redirect('/comptabilite-fature-liste')->with('success', 'Facture modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $facture = ComptabiliteFacture::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $facture->delete();
        return redirect('/comptabilite-fature-liste')->with('success', 'Facture supprimée!');

    }
}
