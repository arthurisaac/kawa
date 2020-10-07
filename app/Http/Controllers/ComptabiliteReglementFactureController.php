<?php

namespace App\Http\Controllers;

use App\Models\ComptabiliteFacture;
use App\Models\ComptabiliteReglementFacture;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComptabiliteReglementFactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $factures = ComptabiliteFacture::all();
        return view('/comptabilite/reglement-facture.index', compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $reglements = ComptabiliteReglementFacture::all();
        return view('/comptabilite/reglement-facture.liste', compact('reglements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $factures = new ComptabiliteReglementFacture([
            'facture' => $request->get('facture'),
            'date' => $request->get('date'),
            'modeReglement' => $request->get('modeReglement'),
            'pieceComptable' => $request->get('pieceComptable'),
            'montantVerse' => $request->get('montantVerse'),
            'montantRestant' => $request->get('montantRestant'),
        ]);
        $factures->save();
        return redirect('/comptabilite-reglement-fature')->with('success', 'Règlement enregistré!');
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
