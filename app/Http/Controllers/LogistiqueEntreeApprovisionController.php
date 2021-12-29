<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeApprovision;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeApprovisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-approvision.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entrees = LogistiqueEntreeApprovision::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-approvision.liste', compact('entrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $entree = new LogistiqueEntreeApprovision([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'fournisseur' => $request->get('fournisseur'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $entree->save();
        return redirect('/logistique-entree-approvision')->with('success', 'Entrée approvisionnement enregistrée');
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
        $entree = LogistiqueEntreeApprovision::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-approvision.edit', compact('fournisseurs', 'entree'));
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
        $entree = LogistiqueEntreeApprovision::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->debutSerie = $request->get('debutSerie');
        $entree->finSerie = $request->get('finSerie');
        $entree->date = $request->get('date');
        $entree->fournisseur = $request->get('fournisseur');
        $entree->prixUnitaire = $request->get('prixUnitaire');
        $entree->save();
        return redirect('/logistique-entree-approvision-liste')->with('success', 'Entrée approvisionnement enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entree = LogistiqueEntreeApprovision::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->delete();
        return redirect('/logistique-entree-approvision-liste')->with('success', 'Entrée approvisionnement supprimée');
    }
}
