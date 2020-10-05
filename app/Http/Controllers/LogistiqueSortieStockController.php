<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueProduit;
use App\Models\LogistiqueSortieStock;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueSortieStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $produits = LogistiqueProduit::all();
        return view('/logistique/achat/sortie-stock.index', compact('produits'));
    }

    public function liste()
    {
        $stocks = LogistiqueSortieStock::all();
        return view('/logistique/achat/sortie-stock.liste', compact('stocks'));
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
        $stock = new LogistiqueSortieStock([
            'produit' => $request->get('produit'),
            'quantite' => $request->get('quantite'),
            'dateSortie' => $request->get('dateSortie'),
            'motif' => $request->get('motif'),
            'dateSaisie' => $request->get('dateSaisie'),
            'observation' => $request->get('observation'),
            'service' => $request->get('service'),
        ]);
        $stock->save();
        return redirect('/logistique-sortie-stock')->with('success', 'Sortie stock enregistrée!');
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
        $produits = LogistiqueProduit::all();
        $stock = LogistiqueSortieStock::find($id);
        return view('/logistique/achat/sortie-stock.edit', compact('produits', 'stock'));
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
        $stock = LogistiqueSortieStock::find($id);
        $stock->produit = $request->get('produit');
        $stock->quantite = $request->get('quantite');
        $stock->dateSortie = $request->get('dateSortie');
        $stock->motif = $request->get('motif');
        $stock->dateSaisie = $request->get('dateSaisie');
        $stock->observation = $request->get('observation');
        $stock->service = $request->get('service');

        $stock->save();
        return redirect('/logistique-sortie-stock-liste')->with('success', 'Sortie stock mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $stock = LogistiqueSortieStock::find($id);
        $stock->delete();
        return redirect('/logistique-sortie-stock-liste')->with('success', 'Sortie stock enregistrée!');
    }
}
