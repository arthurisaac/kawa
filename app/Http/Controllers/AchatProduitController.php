<?php

namespace App\Http\Controllers;

use App\Models\AchatProduit;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\LogistiqueProduit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AchatProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $produits = LogistiqueProduit::all();
        return view('achat.produit.index', compact('centres', 'centres_regionaux', 'produits'));
    }

    public function liste()
    {
        $produits = AchatProduit::all();
        return view('achat.produit.liste', compact('produits'));
    }

    public function rechercheParProduit()
    {
        $produits = AchatProduit::all();
        return view('achat.produit.par-produit', compact('produits'));
    }

    public function rechercheParBudget()
    {
        $produits = AchatProduit::all();
        return view('achat.produit.par-budget', compact('produits'));
    }

    public function rechercheParCentre()
    {
        $produits = AchatProduit::all();
        return view('achat.produit.par-centre', compact('produits'));
    }

    public function rechercheParService()
    {
        $produits = AchatProduit::all();
        return view('achat.produit.par-service', compact('produits'));
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
        $achat = new AchatProduit([
            'date' => $request->get('date'),
            'produit' => $request->get('produit'),
            'affectationService' => $request->get('affectationService'),
            'affectationDirection' => $request->get('affectationDirection'),
            'affectationDirectionGenerale' => $request->get('affectationDirectionGenerale'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'quantite' => $request->get('quantite'),
            'montant'  => $request->get('montant'),
            'montantTTC' => $request->get('montantTTC'),
            'montantHT' => $request->get('montanyHT'),
            'suiviBudgetaire' => $request->get('suiviBudgetaire'),
        ]);
        $achat->save();
        return redirect('achat-produit-liste')->with('success', 'Enregistrement effectué!');

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
        $achat = AchatProduit::find($id);
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $produits = LogistiqueProduit::all();
        return view('achat.produit.edit',
            compact('centres', 'centres_regionaux', 'achat', 'produits'));
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
        $achat = AchatProduit::find($id);
        $achat->date = $request->get('date');
        $achat->produit = $request->get('produit');
        $achat->affectationService = $request->get('affectationService');
        $achat->affectationDirection = $request->get('affectationDirection');
        $achat->affectationDirectionGenerale = $request->get('affectationDirectionGenerale');
        $achat->centre = $request->get('centre');
        $achat->centreRegional = $request->get('centreRegional');
        $achat->quantite = $request->get('quantite');
        $achat->montant  = $request->get('montant');
        $achat->montantTTC = $request->get('montantTTC');
        $achat->montantHT = $request->get('montantHT');
        $achat->suiviBudgetaire = $request->get('suiviBudgetaire');
        $achat->save();
        return redirect('achat-produit-liste')->with('success', 'Enregistrement effectué!');
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
