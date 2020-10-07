<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueFournisseur;
use App\Models\LogistiqueProduit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::all();
        return view('/logistique/achat/produit.index', compact('fournisseurs'));
    }

    public function liste()
    {
        $produits = LogistiqueProduit::with('fournisseurs')->get();
        return view('/logistique/achat/produit.liste', compact('produits'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $produit = new LogistiqueProduit([
            'fournisseur' => $request->get('fournisseur'),
            'reference' => $request->get('reference'),
            'libelle' => $request->get('libelle'),
            'description' => $request->get('description'),
            'seuil' => $request->get('seuil'),
            'stockAlert'  => $request->get('stockAlert'),
            'ves' => $request->get('ves'),
            'prix' => $request->get('prix'),
        ]);
        $produit->save();
        return redirect('/logistique-produit')->with('success', 'Produit enregistré!');
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
        $produits = LogistiqueProduit::where('id', $id)->with('fournisseurs')->get();
        $produit = $produits[0];
        $fournisseurs = LogistiqueFournisseur::all();
        return view('/logistique/achat/produit.edit', compact('produit','fournisseurs'));
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
        $produit = LogistiqueProduit::find($id);
        $produit->fournisseur = $request->get('fournisseur');
        $produit->reference = $request->get('reference');
        $produit->libelle = $request->get('libelle');
        $produit->description = $request->get('description');
        $produit->seuil = $request->get('seuil');
        $produit->stockAlert  = $request->get('stockAlert');
        $produit->ves = $request->get('ves');
        $produit->prix = $request->get('prix');

        $produit->save();
        return redirect('/logistique-produit-liste')->with('success', 'Produit mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $produit = LogistiqueProduit::find($id);
        $produit->delete();
        return redirect('/logistique-produit-liste')->with('success', 'Produit supprimé avec succès!');
    }
}
