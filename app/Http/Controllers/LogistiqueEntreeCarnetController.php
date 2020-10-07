<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeCarnetCaisse;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueEntreeCarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::all();
        return view('/logistique/fourniture/entree-carnet.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entrees =  LogistiqueEntreeCarnetCaisse::all();
        return view('/logistique/fourniture/entree-carnet.liste', compact('entrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $entree = new LogistiqueEntreeCarnetCaisse([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'fournisseur' => $request->get('fournisseur'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $entree->save();
        return redirect('/logistique-entree-carnet')->with('success', 'Entrée carnet de caisse enregistrée');
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
        $fournisseurs = LogistiqueFournisseur::all();
        $entree = LogistiqueEntreeCarnetCaisse::find($id);
        return view('/logistique.fourniture.entree-carnet.edit', compact('fournisseurs', 'entree'));
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
        $entree = LogistiqueEntreeCarnetCaisse::find($id);
        $entree->debutSerie = $request->get('debutSerie');
        $entree->finSerie = $request->get('finSerie');
        $entree->date = $request->get('date');
        $entree->fournisseur = $request->get('fournisseur');
        $entree->prixUnitaire = $request->get('prixUnitaire');
        $entree->save();
        return redirect('/logistique-entree-carnet-liste')->with('success', 'Entrée carnet de caisse enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entree = LogistiqueEntreeCarnetCaisse::find($id);
        $entree->delete();
        return redirect('/logistique-entree-carnet-liste')->with('success', 'Entrée carnet de caisse supprimée');
    }
}
