<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeSecuripack;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeSecuripackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('logistique.fourniture.entree-securipack.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entrees =  LogistiqueEntreeSecuripack::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-securipack.liste', compact('entrees'));
    }

    public function rechercher()
    {
        $entreeBordereaux =  LogistiqueEntreeSecuripack::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-securipack.liste', compact('entreeBordereaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $entree = new LogistiqueEntreeSecuripack([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'fournisseur' => $request->get('fournisseur'),
            'prixUnitaire' => $request->get('prixUnitaire'),
            'reference' => $request->get('reference'),
        ]);
        $entree->save();
        return redirect('/logistique-entree-securipack')->with('success', 'Entrée enregistrée!');
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
        $entree = LogistiqueEntreeSecuripack::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-securipack.edit', compact('fournisseurs', 'entree'));
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
        $entree = LogistiqueEntreeSecuripack::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->debutSerie = $request->get('debutSerie');;
        $entree->finSerie = $request->get('finSerie');
        $entree->date = $request->get('date');
        $entree->fournisseur = $request->get('fournisseur');
        $entree->prixUnitaire = $request->get('prixUnitaire');
        $entree->reference = $request->get('reference');
        $entree->save();
        return redirect('/logistique-entree-securipack-liste')->with('success', 'Entrée enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entree = LogistiqueEntreeSecuripack::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->delete();
        return redirect('/logistique-entree-securipack-liste')->with('success', 'Entrée supprimée!');
    }
}
