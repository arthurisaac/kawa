<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeMaintenance;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-maintenance.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $entrees = LogistiqueEntreeMaintenance::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-maintenance.liste', compact('entrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entree = new LogistiqueEntreeMaintenance([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'fournisseur' => $request->get('fournisseur'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $entree->save();
        return redirect('/logistique-entree-maintenance')->with('success', 'Entrée fiche de maintenance DAB enregistrée');
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
        $entree = LogistiqueEntreeMaintenance::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-maintenance.edit', compact('fournisseurs', 'entree'));
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
        $entree = LogistiqueEntreeMaintenance::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->debutSerie = $request->get('debutSerie');
        $entree->finSerie = $request->get('finSerie');
        $entree->date = $request->get('date');
        $entree->fournisseur = $request->get('fournisseur');
        $entree->prixUnitaire = $request->get('prixUnitaire');
        $entree->save();
        return redirect('/logistique-entree-maintenance-liste')->with('success', 'Entrée fiche de maintenance DAB enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entree = LogistiqueEntreeMaintenance::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->delete();
        return redirect('/logistique-entree-maintenance-liste')->with('success', 'Entrée fiche de maintenance DAB supprimée');
    }
}
