<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeStock;
use App\Models\LogistiqueFournisseur;
use App\Models\LogistiqueProduit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $produits = LogistiqueProduit::where('localisation_id', Auth::user()->localisation_id)->get();
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/achat/entree-stock.index', compact('produits', 'fournisseurs'));
    }

    public function liste()
    {
        $stocks = LogistiqueEntreeStock::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/achat/entree-stock.liste', compact('stocks'));
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
        $entreeStock = new LogistiqueEntreeStock([
            'produit' => $request->get('produit'),
            'dateApprovisionnement' => $request->get('dateApprovisionnement'),
            'fournisseur' => $request->get('fournisseur'),
            'quantite' => $request->get('quantite'),
            'prixAchat' => $request->get('prixAchat'),
            'observation' => $request->get('observation'),
            'facture' => $request->get('facture'),
        ]);
        $entreeStock->save();
        return redirect('/logistique-entree-stock')->with('success', 'Entrée stock enregistrée!');
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
        $entreeStock = LogistiqueEntreeStock::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $produits = LogistiqueProduit::where('localisation_id', Auth::user()->localisation_id)->get();
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/achat/entree-stock.edit', compact('produits', 'fournisseurs', 'entreeStock'));
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
        $entreeStock = LogistiqueEntreeStock::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entreeStock->produit = $request->get('produit');
        $entreeStock->dateApprovisionnement = $request->get('dateApprovisionnement');
        $entreeStock->fournisseur = $request->get('fournisseur');
        $entreeStock->quantite = $request->get('quantite');
        $entreeStock->prixAchat = $request->get('prixAchat');
        $entreeStock->observation = $request->get('observation');
        $entreeStock->facture = $request->get('facture');
        $entreeStock->save();
        return redirect('/logistique-entree-stock-liste')->with('success', 'Entrée de stock enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entreeStock = LogistiqueEntreeStock::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $entreeStock->delete();
        return redirect('/logistique-entree-stock-liste')->with('success', 'Entrée de stock supprimée!');
    }
}
