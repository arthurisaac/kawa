<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeCommande;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeBonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-bon-commande.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entrees = LogistiqueEntreeCommande::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-bon-commande.liste', compact('entrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
