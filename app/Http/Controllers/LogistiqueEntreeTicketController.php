<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeTicketVisite;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique.fourniture.entree-ticket-visiteur.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entrees = LogistiqueEntreeTicketVisite::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique.fourniture.entree-ticket-visiteur.liste', compact('entrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $entree = new LogistiqueEntreeTicketVisite([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'fournisseur' => $request->get('fournisseur'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $entree->save();
        return redirect('/logistique-entree-ticket')->with('success', 'Entrée ticket visiteur enregistrée');
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
        $entree = LogistiqueEntreeTicketVisite::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique.fourniture.entree-ticket-visiteur.edit', compact('fournisseurs', 'entree'));
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
        $entree = LogistiqueEntreeTicketVisite::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->debutSerie = $request->get('debutSerie');
        $entree->finSerie = $request->get('finSerie');
        $entree->date = $request->get('date');
        $entree->fournisseur = $request->get('fournisseur');
        $entree->prixUnitaire = $request->get('prixUnitaire');
        $entree->save();
        return redirect('/logistique-entree-ticket-liste')->with('success', 'Entrée ticket visiteur enregistrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entree = LogistiqueEntreeTicketVisite::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entree->delete();
        return redirect('/logistique-entree-ticket-liste')->with('success', 'Entrée ticket visiteur supprimée');
    }
}
